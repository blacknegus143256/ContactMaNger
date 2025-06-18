<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $search = $request->input('search');
        $contacts = Contact::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
        })
        ->orderBy('name')
        ->get();

    return view('contacts.index', compact('contacts', 'search'));
    }
    public function create() {
        return view('contacts.create');
    }

    public function store(Request $request) {
        Contact::create($request->only(['name', 'email', 'phone']));
        return redirect()->route('contacts.index');
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
        $contact->update($request->only(['name', 'email', 'phone']));
        return redirect()->route('contacts.index');
    }

    public function destroy($id) {
        Contact::destroy($id);
        return redirect()->route('contacts.index');
    }
}

