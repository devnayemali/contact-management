<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function list()
    {
        return view('contact.list');
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request  $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
        ]);
        Contact::create($request->all());
        return redirect()->route('contacts.list')->with('success', 'Contact created successfully.');
    }
}
