<?php

namespace App\Http\Controllers;
use App\Mail\SendManualRequest;
use Mail;


class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 /*   public function email(){

        Mail::send(

            ['text'=>'emails.startmail'],[],function($message){
            $message->to(Auth::user()->email,Auth::user()->first_name)->subject('Welcome to CommUnityQ');
            $message->from('tagg@gmail.com','tagg');
        });
        Mail::to(Auth::user()->email)->send(new RegistrationSuccessful(Auth::user()));

        return redirect('\home');

    }*/

    public function manualRequestMail() {

        Mail::to('somebody@gmail.coom')->send(new SendManualRequest());

        return redirect('\home');
    }
}