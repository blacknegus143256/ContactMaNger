<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    public function index(Request $request) {
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
        $data = $request->only(['name', 'email', 'phone']);
        if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('photos', 'public');
    }
Contact::create($data);
        return redirect()->route('contacts.index');
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
        $data = $request->only(['name', 'email', 'phone']);

    if ($request->hasFile('photo')) {
        if ($contact->photo && Storage::disk('public')->exists($contact->photo)) {
            Storage::disk('public')->delete($contact->photo);
        }
        $data['photo'] = $request->file('photo')->store('photos', 'public');
    }

    $contact->update($data);
        return redirect()->route('contacts.index');
    }

    public function destroy($id) {
        Contact::destroy($id);
        return redirect()->route('contacts.index');
    }
}

