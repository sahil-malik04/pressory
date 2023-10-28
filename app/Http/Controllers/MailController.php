<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;

class MailController extends Controller
{
    public function sendMail($to, $subject, $body){
        $data = ['subject' => $subject, 'message' => $body];
        try {
            Mail::to($to)->send(new ForgetPasswordMail($data));
        } catch (\Exception $e) {
            report($e);
        }          
    }
}
