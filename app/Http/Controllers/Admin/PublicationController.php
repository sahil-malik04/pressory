<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Publication;
use DataTables;
use File;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Country;


class PublicationController extends Controller
{
      /**
     * Publication Display using Datatables .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index()
    {
        $country = Country::all();
        return view('admin.publication.table',compact('country'));
    }
    
    public function indexTable()
    {
        $data = Publication::with('country')->latest()->get();
        return response()->json($data);
    }
    /**
     * Add Publication Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function viewPublication()
    {
        return view('admin.publication.add');
    }
      /**
     * Add Publication .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
   
    public function addPublication(Request $req)
    {
        $req->validate([
            "publication"=>"required",
            "domain"=>"required",
            "country"=>"required",
            "image" =>"required|mimes:jpeg,png,jpg,gif,svg|max:2048",
            'website' => 'required',
            'twitter' => 'required',
            'wiki_pedia' => 'required',
        ]);
       $publication = new Publication();
       $publication->publication = $req->publication;
       $publication->domain = $req->domain;
       $publication->country = $req->country;
       $publication->website = $req->website;
       $publication->twitter = $req->twitter;
       $publication->wiki_pedia = $req->wiki_pedia;

       $path = storage_path('app/public/publication');

       if(!Storage::exists($path))
       {
        Storage::makeDirectory($path, 0755, true);
       }
        $image = time().'.'.$req->file('image')->getClientOriginalExtension();
        $images = $req->image->move($path,$image); 
        $publication->image = $image; 
       
       if($publication->save())
       {
           return back()->with('message',"Publication inserted successfully");
       }
    }
      /**
     * edit Publication Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function editPublication($id)
    {
        $publication = Publication::find($id);
        $country = Country::all();
        return view('admin.publication.update',compact('publication','country'));
    }
      /**
     * update Publication .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function updatePublication(Request $req)
    {
        $req->validate([
            "publication"=>"required",
            "domain"=>"required",
            "country"=>"required",
            'website' => 'required',
            'twitter' => 'required',
            'wiki_pedia' => 'required',

        ]);
        $publication = Publication::find($req->id);
       
        $publication->publication = $req->publication;
        $publication->domain = $req->domain;
        $publication->country = $req->country;
        $publication->website = $req->website;
        $publication->twitter = $req->twitter;
        $publication->wiki_pedia = $req->wiki_pedia;
        $path = storage_path('app/public/publication');

       if(!Storage::exists($path))
       {
        Storage::makeDirectory($path, 0755, true);
       }
       if($req->file('image')){

           $image = time().'.'.$req->file('image')->getClientOriginalExtension();
           $images = $req->image->move($path,$image);  
           $publication->image = $image; 
        }
      
        if($publication->save())
        {
            return back()->with('message',"Publication updated successfully");
        }
     }
       /**
     * Delete Publication  .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
     public function deletePublication($id)
     {
        $publication = Publication::findOrFail($id);
        if($publication->delete())
        {
            return back()->with('message',"Publication deleted successfully");
        }
     }
}
