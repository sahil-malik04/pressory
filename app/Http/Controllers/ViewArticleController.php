<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Article;
use App\Models\Author;
use App\Models\Publication;     
use App\Models\activitie;
use App\Models\AuthorArcticles;
use App\Models\ArticleFallacie;
use App\Models\Fallacie;
use App\Models\FallacyComment;
use App\Models\FallacyVote;
use App\Models\ArticleLike;
class ViewArticleController extends Controller
{
    /**
     * Create viewArticle() for fetching Article view Page Data using Eloquent Relationship.And Also use id parameter in route url  
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewArticle($id, $name)
    {
        $article = Article::with('articlesAuthors','publication','articleFallacieData.fallacy','articleFallacyVote')->where('id',$id)->paginate(20);
        $like = ArticleLike::where(['like_status'=>1,'article_id'=>$id])->count();
        $dislike = ArticleLike::where(['like_status'=>0,'article_id'=>$id])->count();
        
        if($article){
            return response()->json(["article"=>$article,"like"=>$like,"dislike"=>$dislike,"status"=>200]);
        }
    }
    
    /**
     * Create viewAuthors() for fetching Author view Page Data using Eloquent Relationship.And Also use id parameter in route url  
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function viewAuthors($id, $name)
    {
        $authors = Author::where('id',$id)->first();
       $list = Article::with('publication','articlesAuthors')->whereHas('articlesAuthors',function($q) use($id){
                return $q->where('author_id',$id);
        })->latest()->paginate(20);
        if($authors)
        {
            return response()->json(["author"=>$authors,"list"=>$list,"status"=>200]);

        }
    }
    /**
     * Create viewPublication() for fetching publication view Page Data using Eloquent Relationship.And Also use id parameter in route url  
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function viewPublication($id, $name)
    {
        $publication = Publication::with('countryPublication')->where('id',$id)->first();
        $list = Article::with('publication','articlesAuthors')->where('publication_id',$id)->latest()->paginate(20);
        if($publication)
        {
          return response()->json(["publication"=>$publication,"list"=>$list,"status"=>200]);
        }
    }
    /**
     * Create addFallacies() for Add Fallacies of Article  Page. 
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @return \Illuminate\Http\request
     */
    
    public function addFallacies(Request $req)
    {
       $data = new ArticleFallacie();
       $data->article_id = $req->article_id;
       $data->user_id = $req->user_id;
       $data->fallacy_statement = $req->fallacy_statement;
       $data->fallacy_id = $req->fallacy_id;
       $data->confirmation = $req->confirmation;
       if($data->save()){
           return response()->json(["message"=>"Data Insert SuccessFully","status"=>200]);
        }
    }

    public function addComment(Request $req,$id)
    {
        $req->validate([
            'user_id'=>'required',
            'comment'=>'required',
        ]);

        $data = new FallacyComment();
        $data->article_fallacy_id = $id;
        $data->user_id = $req->user_id;
        $data->comment = $req->comment;
        if($data->save())
        {
            return response()->json(["message"=>"Data Insert SuccessFully","status"=>200]);
        }
    }
    
    public function addVote(Request $req,$id)
    {
        $req->validate([
            'user_id'=>'required',
            'vote'=>'required',
        ]);
        $data = new FallacyVote();
        $data->article_fallacy_id = $id;
        $data->user_id = $req->user_id;
        $data->vote = $req->vote;
        if($data->save())
        {
            return response()->json(["message"=>"Data Insert SuccessFully","status"=>200]);
        }
    }
     /**
     * api created to save like and dislike
     *
     * @return \Illuminate\Http\JsonResponse
     */ 

    public function articleLike(Request $req){
        $data = [
            'user_id'=>$req->user_id,
            'article_id'=>$req->article_id,
            'like_status'=>$req->like_status
        ];
        $like = ArticleLike::updateOrCreate(['user_id'=>$req->user_id,'article_id'=>$req->article_id],$data);

        
        if($like){
            $totalLike = ArticleLike::where(['like_status'=>1,'article_id'=>$like->article_id])->count();
            $totalDislike = ArticleLike::where(['like_status'=>0,'article_id'=>$like->article_id])->count();
            
            $res = $like->like_status == 1 ? 'Like' : 'Dislike';
            return response()->json(["message"=>$res." is inserted successfully","status"=>200, 'like'=> $totalLike,'dislike'=> $totalDislike]);
        }
    }
        
}




       
    
