<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Permission;
use App\Models\Admin\User;
use Auth;

class PermissionController extends Controller
{
    public function index()
    {
        if(\Gate::forUser(Auth::guard('user')->user())->allows('isAdmin')){

            $post = Permission::orderby('id','DESC')->get();
            return view('admin.permission.table',compact('post'));
        }
        abort(404);
    }
    public function viewPermission(User $user)
    {
        if(\Gate::forUser(Auth::guard('user')->user())->allows('isAdmin')){

          return view('admin.permission.add');
        }
        abort(404);
      

    }
    
    public function addPermission(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
        ]);
        $post = new Permission();
        $post->name =  $req->name;
        if($post->save())
        {
            return redirect()->intended('/permission');
        }
    }

    public function editPermission($id)
    {   
        if(\Gate::forUser(Auth::guard('user')->user())->allows('isAdmin')){
            $post = Permission::findOrFail($id);
            return view('admin.permission.update',compact('post'));
        }
        abort(404);

    }

    public function updatePermission(Request $req)
    {
        $req->validate([
            'name' => 'required|max:255',
        ]);
        $post = Permission::findOrFail($req->id);
        $post->name =  $req->name;
        if($post->save())
        {
            return redirect()->intended('/permission');
        }
    }

    public function deletePermission($id)
    {
        if(\Gate::forUser(Auth::guard('user')->user())->allows('isAdmin')){
        $post = Permission::findOrFail($id);
        if($post->delete())
        {
            return redirect()->intended('/permission');
        }
    }
    abort(404);
    }


}
