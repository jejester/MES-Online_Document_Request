<?php

namespace App\Http\Controllers\Contact;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {   
        return view('contact_us');
    }

    public function submit(ContactRequest $request)
    {
        Mail::to('delacruz.j.bsinfotech@gmail.com')->send(new ContactMail($request->name, $request->email, $request->content));
        return redirect()->back()->with('message', 'Message sent successfully!');
    }
}
