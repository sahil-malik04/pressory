<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\ForgotPassword; 
use App\Models\EmailTemplate;
use App\Mail\ForgetUserNameMail;
use App\Models\User;
use App\Http\Controllers\MailController;
use Hash;

class ForgotPaswordController extends Controller
{
  public function pageView($token){
    
    return view('reset-password',compact('token'));
  }

    public function index(Request $req){
      $validator  = Validator::make($req->all(), [
        'email' => 'required|email|exists:users',
      ]);
      
      if($validator ->fails()){
        return back()->withErrors("We couldn't find an account associated with this email address.");
      }
      $token = Str::random(64);
      $data = ForgotPassword::create([
        'email' =>$req->email,
        'token'=>$token
      ]);
      $email_template = EmailTemplate::find(3);
      $username = User::whereEmail($req->email)->first();
      $link = route('reset.pass',[$token]); 
      return response()->json($link);
      // dd($link);
      // $template = Str::replace(['{LOGO}','{USER}','{LINK}'],["Pressory",$username->name,$link], $email_template->template_body);
      // $email = $req->email;
      // try{
      //   (new MailController)->sendMail($email,$email_template->subject,$template);
      // }
      // catch(\Exception $e){
      //    return report($e);
      // }
      
    }

    public function changePassword(Request $req){
      $data = ForgotPassword::where('token',$req->forget_token)->first();
      $password = Hash::make($req->new_password);
      $users  = User::where(['email'=>$data->email])->update(['password'=>$password]);
      if($users){
        $data->delete();
         return response()->json(["message"=>"password updated successfully","status"=>200]);
          // this.$fire({
          // title: res.data.message,
          // type: "success",
          // timer: 3000
          // })
      }
    }
      


    public function changeUsername(Request $req){
        $validator  = Validator::make($req->all(), [
            'email' => 'required|email|exists:users',
          ]);
        
          if($validator ->fails()){
            return back()->withErrors("We couldn't find an account associated with this email address.");
          }
          // $email_template = EmailTemplate::find(5);
          $username = User::whereEmail($req->email)->first();
          return response()->json(["username"=>$username->username]);
        //   $template = Str::replace(['{USER}','{USERNAME}'],[$username->name,$username->username], $email_template->template_body);
          
        //   try{
        //    $data =  new ForgetUserNameMail($template);
        //     return $data;
        // //    $email =  Mail::to($req->email)->send();

        //    return $email;
        //   }catch(\Exception $e){
        //       report($e);
        //   }
    }
}
