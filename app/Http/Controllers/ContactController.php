<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(Request $request) {
        $search = $request->input('search');
        $contacts = Contact::query()
        ->where('user_id', Auth::id())
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%");
                });
            })
        ->orderBy('name')
        ->get();

    return view('contacts.index', compact('contacts', 'search'));
    }
    public function create() {
        return view('contacts.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'photo' => 'nullable|image',
    ]);
        $validated['user_id'] = Auth::id();
        if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('photos', 'public');
    }
Contact::create($validated);
        return redirect()->route('contacts.index');
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
         if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
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
        $contact = Contact::findOrFail($id);

        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        if ($contact->photo && Storage::disk('public')->exists($contact->photo)) {
            Storage::disk('public')->delete($contact->photo);
        }

        $contact->delete();
        return redirect()->route('contacts.index');
    }
}

