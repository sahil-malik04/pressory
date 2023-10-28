<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\RssFeed;
use App\Models\Admin\RssLog;
use App\Models\Admin\Publication;
use DataTables;

class RssfeedController extends Controller
{
      /**
     * display RssFeed Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index(Request $request)
    {
        $publication = Publication::all();
        return view('admin.rssfeed.table',["publication"=>$publication]);
    }

    public function indexTable()
    {
        $data = RssFeed::with('publications')->latest()->get();
        return response()->json($data);
    }
      /**
     * Add RssFeed Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function viewRssFeed()
    {
        return view('admin.rssfeed.add');
    }
   
     /**
     * Add RssFeed  .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function addRssFeed(Request $req)
    {
        $req->validate([
            "feed_address"=>"required",
            "description"=>"required",
            "publication_id"=>"required",

        ]);
       $rss = new RssFeed();
       $rss->feed_address = $req->feed_address;
       $rss->description = $req->description;
       $rss->publication_id = $req->publication_id;
       if($rss->save())
       {
           return back()->with('message',"Rssfeed inserted successfully");
       }
    }
      /**
     * edit RssFeed Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function editRssFeed($id)
    {
        $rss = RssFeed::find($id);
        $publication = Publication::all();
        return view('admin.rssfeed.update',['rss'=>$rss,"publication"=>$publication]);
    }
      /**
     * update RssFeed .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function updateRssFeed(Request $req)
    {
        $req->validate([
            "feed_address"=>"required",
            "description"=>"required",
            "publication_id"=>"required",

        ]);
        $rss = RssFeed::find($req->id);
       
        $rss->feed_address = $req->feed_address;
        $rss->description = $req->description;
        $rss->publication_id = $req->publication_id;
        if($rss->save())
        {
            return back()->with('message',"Rssfeed updated successfully");
        }
     }
       /**
     * delete RssFeed .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
     public function deleteRssFeed($id)
     {
        $rss = RssFeed::find($id);
        if($rss->delete())
        {
            return back()->with('message',"Rssfeed deleted successfully");
        }
     }
}
