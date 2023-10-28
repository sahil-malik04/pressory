<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\User;
use App\Models\Admin\Author;
use App\Models\Admin\Article;

use App\Models\Admin\Publication;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Storage;
class LoginController extends Controller
{
    /**
     * Login user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function loginUser(Request $req)
    {
    $req->validate([
        "email"=>"required|email",
        "password"=>"required",
    ]);
      $email = $req->email;
      $password = $req->password;
      if(Auth::guard('user')->attempt(['email'=>$email,'password'=>$password,"user_type_id"=>1],$req->get('remember')))
        {
        //   $req->session()->put('message', 'You are login successfully');
          return redirect()->intended('/admin/dashboard');
        }
          // abort(404);
        return back()->with("error","Invalid Credentials");
    }
    /**
     * redirect dashboard .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $users = User::where('user_type_id',2)->count();
        $author = Author::all()->count();
        $publication = Publication::all()->count();
        $article = Article::count();

        return view('admin.dashboard',['users'=>$users,'author'=>$author,'publication'=>$publication,'article'=>$article]);
    }
    public function showNormalUserList(){
        $users = User::where('user_type_id',2)->latest()->take(20)->get(); 
        return response()->json($users);

    }

       
    /**
     * Update user Profile view Page .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editProfile()
    {
        $profile = User::find(Auth::guard('user')->user()->id);
        return view('admin.profile',['profile'=>$profile]);
    }
      
    /**
     * Update user Profile .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile(Request $req)
    {
        $req->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
        ]);
        $user = User::find($req->ids);
        $first_name = $req->first_name;
        $last_name = $req->last_name;

        $email = $req->email;
        $path = storage_path('app/public/user');

        if(!Storage::exists($path))
        {
         Storage::makeDirectory($path, 0755, true);
        }

        if($req->profile_image){
            $image = time().'.'.$req->file('profile_image')->getClientOriginalExtension();
            $images = $req->profile_image->move($path,$image);   
            $user->profile_image = $image; 
        }
        $user->first_name = $first_name;
        $user->last_name = $last_name;

        $user->email = $email;
        if($user->save())
        {
            return redirect('/admin/dashboard')->with('message',"Your profile is updated");
        }
    }
    /**
     * Logout User .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logoutUser()
    {
        Auth::guard('user')->logout();
        session()->flush();
        return redirect('/admin/login')->with("message","You are logout successfully");

    }
    /**
     * Change Password view Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function confirmPasswordPage()
    {
        return view('admin.password-reset');
    }

    /**
     * Change Password .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function confirmPasswordIndex(Request $req)
    {
        $req->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        User::find(Auth::guard('user')->user()->id)->update(['password'=> Hash::make($req->new_password)]);
        return back()->with("message","Password change successfully");
    }

   

   
}
