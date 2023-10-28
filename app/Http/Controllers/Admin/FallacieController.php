<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Fallacie;
use App\Models\Admin\Article;
use App\Models\Admin\ArticleFallacie;
use DataTables;


class FallacieController extends Controller
{
    /**
     * Display All fallacy Using Datatable.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        return view('admin.fallacy.table');
    }

    public function fallacieTable()
    {
        $data = Fallacie::latest()->get();
        return response()->json($data);
    }
    /**
     * view fallacy Add.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewFallacy()
    {
        return view('admin.fallacy.add');
    }
     /**
     * fallacy insert.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */   
    public function addFallacy(Request $req)
    {
        $req->validate([
            "fallacy"=>"required",
            "code"=>"required",
            "description"=>"required",

        ]);
       $fallacy = new Fallacie();
       $fallacy->fallacy = $req->fallacy;
       $fallacy->code = $req->code;
       $fallacy->description = $req->description;
       if($fallacy->save())
       {
           return back()->with('message',"Fallacy inserted successfully");
       }
    }
     /**
     * fallacy edit page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function editFallacy($id)
    {
        $fallacy = Fallacie::find($id);
        return view('admin.fallacy.update',compact('fallacy'));
    }
     /**
     * fallacy Update.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function updateFallacy(Request $req)
    {
        $req->validate([
            "fallacy"=>"required",
            "code"=>"required",
            "description"=>"required",
            
        ]);
        $fallacy = Fallacie::find($req->id);
        $fallacy->fallacy = $req->fallacy;
        $fallacy->code = $req->code;
        $fallacy->description = $req->description;
        if($fallacy->save())
        {
            return back()->with('message',"Fallacy updated successfully");
        }
     }
      /**
     * fallacy delete.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
     public function deleteFallacy($id)
     {
        $fallacy = Fallacie::findOrFail($id);
        if($fallacy->delete())
        {
            return back()->with('message',"Fallacy deleted successfully");
        }
     }
    /**
     * Article Fallacy Display using Datatables .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 

     public function Fallaciesarticles()
     {
         return view('admin.fallacy.fallacies_article');
    }
        
    public function fallacieArticleTable()
    {
        $data = ArticleFallacie::with('articles','users','fallacies')->get(); 
        return response()->json($data);        
    }
        

     public function updateConfirmation(Request $req)
     {
        $fallacies = ArticleFallacie::find($req->id);
        $fallacies->confirmation = $req->status;
        if($fallacies->save())
        {
            return response()->json(["message"=>"Confirmation updated successfully"]);
        }
     }
        

}
