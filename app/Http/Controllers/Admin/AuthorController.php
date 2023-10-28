<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Author;
use DataTables;
use Illuminate\Support\Facades\Storage;



class AuthorController extends Controller
{
    /**
     * Display All Author Using Datatable.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('admin.author.table');
    }
    public function getAuthors(Request $request)
    {   
        $data = Author::latest()->get();
        return response()->json($data); 
    }

    /**
     * Author insert Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewAuthor()
    {
        return view('admin.author.add');
    }
    /**
     * Author insert  .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function addAuthor(Request $req)
    {
        $req->validate([
            "author_name"=>"required",
            "nationality"=>"required",
            'image' => 'required',
            'image.*' => 'required|mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
            'website' => 'required',
            'twitter' => 'required',
            'wiki_pedia' => 'required',

        ]);
       $author = new Author();
       $author->author_name = $req->author_name;
       $author->nationality = $req->nationality;
       $author->website = $req->website;
       $author->twitter = $req->twitter;
       $author->wiki_pedia = $req->wiki_pedia;

       $path = storage_path('app/public/author');

       if(!Storage::exists($path))
       {
        Storage::makeDirectory($path, 0755, true);
       }
       if($req->file('image')){
           $image = time().'.'.$req->file('image')->getClientOriginalExtension();
           $images = $req->image->move($path,$image);   
           $author->image = $image; 
        }
       
       if($author->save())
       {
           return back()->with('message',"Author inserted successfully");
       }
    }
     /**
     * Author edit Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editAuthor($id)
    {
        $author = Author::find($id);
        return view('admin.author.update',compact('author'));
    }
     /**
     * Author update Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateAuthor(Request $req)
    {
        $req->validate([
            "author_name"=>"required",
            "nationality"=>"required",
            'website' => 'required',
            'twitter' => 'required',
            'wiki_pedia' => 'required',
        ]);
        $author = Author::find($req->id);
       
        $author->author_name = $req->author_name;
        $author->nationality = $req->nationality;
        $author->website = $req->website;
        $author->twitter = $req->twitter;
        $author->wiki_pedia = $req->wiki_pedia;
        $path = storage_path('app/public/author');

       if(!Storage::exists($path))
       {
        Storage::makeDirectory($path, 0755, true);
       }
       if($req->file('image')){

           $image = time().'.'.$req->file('image')->getClientOriginalExtension();
           $images = $req->image->move($path,$image);   
           $author->image = $image; 
        }
        if($author->save())
        {
            return back()->with('message',"Author updated successfully");
        }
     }
      /**
     * Author Delete .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function deleteAuthor($id)
     {
        $author = Author::findOrFail($id);
        if($author->delete())
        {
            return back()->with('message',"Author deleted successfully");
        }
     }
     
}
