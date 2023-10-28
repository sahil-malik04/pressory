<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OffersNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('isuser');
    }
  
    public function index()
    {
        return view('admin.product');
    }
    
    public function sendOfferNotification() {
        $userSchema = User::first();
  
        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
        // $userSchema->notify(new OffersNotification($offerData));
        Notification::send($userSchema, new OffersNotification($offerData));
   
        dd('Task completed!');
    }
}