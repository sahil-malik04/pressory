<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index');
    }
    public function showUserList(){
        $users = User::where('user_type_id',2)->latest()->get(); 
        return response()->json($users);

    }
        
}
