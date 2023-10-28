<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;


class GalleryController extends Controller
{
    public function index(){
        return view('cms.gallery.index');
    }
    public function viewListGallery(){
        $gallery = Gallery::all();
        return response()->json($gallery);
    }

    public function addGallery(GalleryRequest $req){
       
        foreach ($req->file('img') as $key => $image) {
            $name = time().'.'.$image->extension();
            $image->move(public_path('/assets/images/uploads/',$name));
            $images[] = $name;
        }
        $gallery = new Gallery();
        $gallery->img_name = $req->img_name;
        $gallery->img = json_encode($images);
       if($gallery->save()){
           return back()->with("message","Gallery image inserted successfully");
       }
    }
}
