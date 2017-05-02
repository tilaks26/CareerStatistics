<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Log;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required|email', 
            'message' => 'required|min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->name,
            'body' => $request->message,
            );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('no-reply@careerstats.com');
            $message->subject($data['subject']);
        });

        $error = 0;

        return view('contact');
    }
}