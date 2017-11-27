<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('live.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    	$recipients = ['najdovskadijana@gmail.com', 'najdovskadijana@hotmail.com'];

    	$contact = request()->validate(Contact::getValidationRules());

        Contact::create($contact);

        Mail::to($recipients)->send(new ContactMail(request()));

        return redirect()->route('contact.index')->with('form_success', 'Your message was successfully sent!');
    }
}
