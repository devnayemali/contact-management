<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function list(Request $request)
    {
        $query = Contact::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        // Sorting functionality
        if ($request->has('sort')) {
            $sort = $request->get('sort');
            $query->orderBy($sort, 'asc');
        }

        $contacts = $query->paginate(10);
        return view('contact.list', compact('contacts'));
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
