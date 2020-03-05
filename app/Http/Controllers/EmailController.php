<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use App\Mail\AdminMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function adminMail() {
        return view('admin.send_mail');
    }

    public function adminSendMail(Request $get) {
        
        $email = $get->email;
        $subject = $get->subject;
        $message = $get->message;

        Mail::to($email)->send(new AdminMail($subject, $message));
        
        return back()->with('success', 'Email Send');
    }
}
