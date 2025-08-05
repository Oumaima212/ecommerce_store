<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('4e924fb030-5ff7ab+user1@inbox.mailtrap.io')->send(new ContactMessage($request->all()));

        return back()->with('success', 'Message envoyé avec succès !');
    }
}

