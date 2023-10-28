<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UserType as Role;
use App\Models\Admin\Permission;
use App\Models\Admin\RolePermission;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
      /**
     * Display role Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index()
    {
        $posts = Role::orderBy('id','DESC')->take(1)->get();
        return view('admin.role',['post'=>$posts]);
    }
      /**
     * Add Role Using Joins .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 

    public function addRole(){
        $roles = [
            ['name'=>'admin'],
            ['name'=>'manager'],
            ['name'=>'supervisor'],
        ];
        Role::insert($roles);
        return "Role Are Created Successfully !";
    }
      /**
     * edit role Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function editRole($id)
    {
        $post = Role::find($id);
        $permission = Permission::all();
        return view('admin.role_update',['post'=>$post,'permission'=>$permission]);
    }

    public function rolePermissionsAdd(Request $req)
    {
        $role = new RolePermission();
        
        for($i=0; $i < count($req->permission_id); $i++)
        {
           $add =  $role->create([
                'permission_id' =>$req->permission_id[$i],
                'role_id'=>$req->id,
            ]);
        }    
        if($add){
            return back()->with("message","Data Inserted");
        }
        

      
        
       
       
    } 




    
}
