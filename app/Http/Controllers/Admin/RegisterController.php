<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\UserType;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
      /**
     * Add New User page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index()
    {
        $roles = UserType::orderBy('id','DESC')->take(1)->get();
        return view('admin.auth.login',compact('roles'));
    }
      /**
     * Add User  .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function registerUser(Request $req)
    {
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->user_type_id = $req->role;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect('/'); 
        
    }
}
