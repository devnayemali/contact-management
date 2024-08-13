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

        $contacts = $query->get();

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

    public function show(int $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    public function edit(int $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $request->id,
        ]);

        // Extract only the fields you want to update
        $data = $request->only(['name', 'email', 'phone', 'address']);

        // Update the contact using the filtered data
        Contact::where('id', $request->id)->update($data);

        return redirect()->route('contacts.list')->with('success', 'Contact updated successfully.');
    }

    public function delete(int $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.list')->with('success', 'Contact deleted successfully.');
    }
}
