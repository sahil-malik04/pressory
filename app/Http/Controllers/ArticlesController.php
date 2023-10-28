<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Author;
use App\Models\Publication;
use App\Models\activitie;
use App\Models\AuthorArcticles;
use App\Models\ArticleFallacie;
use App\Models\Fallacie;
use App\Models\ArticleLike;
use DB;
use App\Models\CmsPage;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\Admin\Faq;


class ArticlesController extends Controller
{
     /**
     * Create search() for fetching Searching Data using search_by,keyword fields
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @return \Illuminate\Http\request
     */
    public function search(Request $req)
    {

        if($req->search_by === "publication")
        {
            $keyword = $req->keyword;
            $result =  Publication::where('publication','like',"%$keyword%")->paginate(20);
        }
        elseif($req->search_by === "article")
        {
            $keyword = $req->keyword;
            $result = Article::where('title','like',"%$keyword%")->paginate(20);
        }
        elseif($req->search_by === "author")
        {
            $keyword = $req->keyword;
            $result = Author::where('author_name','like',"%$keyword%")->paginate(20);
        }elseif($req->search_by === "url")
        {
            $keyword = $req->keyword;
            $result = Article::where('url','like',"%$keyword%")->paginate(20);
        }

        return response()->json(["result"=>$result,"status"=>200]);
    } 
    /**
     * Create getHome() for fetching Home Page Data using Eloquent Relationship  
     *
     * @return \Illuminate\Http\JsonResponse
     */
     
    public function getHome()
    {
        $front = Article::with('user','publication','articlesAuthors','activity')->latest()->paginate(20);
        if($front){
            return response()->json(["HomeData"=>$front,"status"=>200]);
        }
    }
      /**
     * Create getAuthors() for fetching Author Page Data using Eloquent Relationship  
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthors(){
        // $authors = Author::with('articles.publication')->withCount('fallaciesAuthor','articles')->paginate(20);
        $authors = Author::with('articles.publication')->sortable()->paginate(20);
        if($authors){
            return response()->json(["author"=>$authors,"status"=>200]);
        }     

    }
    /**
     * Create getPublication() for fetching Publication Page Data using Eloquent Relationship  
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPublication()
    {
    //    $publication = Publication::withCount('fallaciesPublication','publicationArticle')->paginate(20);
    //    $publication = Publication::sortable()->paginate(20);
    $publication = Publication::with('countryPublication')->sortable()->paginate(20);
         if($publication){
            return response()->json(["publication"=>$publication,"status"=>200]);
        }
    }
    /**
     * Create getArticles() for fetching Article Page Data using Eloquent Relationship  
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function getArticles()
    {
        // $articles = Article::with('articlesAuthors','publication')->withCount('articleFallacieData')->paginate(12);
        $articles = Article::with('articlesAuthors','publication')->sortable()->paginate(10);
        if($articles){
            return response()->json(["articles"=>$articles,"status"=>200]);
        }
    }
     /**
     * Create fallacies() for fetching fallacies Page Data 
     *
     * @return \Illuminate\Http\JsonResponse
     */ 
    public function fallacies()
    {
        $fallicies = Fallacie::sortable()->paginate(20);
        $type_of_fallicies = Fallacie::all();
        if($fallicies){

            return response()->json(["fallicies"=>$fallicies,"type_of_fallicies"=> $type_of_fallicies , "status"=>200]);
        }
    }


        /**
     * Create getCms() for fetching Cms Page Data 
     *
     * @return \Illuminate\Http\JsonResponse
     */ 


    public function getCms(Request $req){
        $list = CmsPage::where('id',$req->id)->first();
        if($list){

            return response()->json(['cms'=>$list,"status"=>200]);
        }

    }
    public function getFaq(){
        $faq = Faq::all();
        if($faq){

            return response()->json(['faq'=>$faq,"status"=>200]);
        }
    }

    
}
