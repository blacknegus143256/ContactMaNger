@extends('layout')
 <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
        <a class="navbar-brand" href="{{ route('contacts.index') }}">Contact Manager</a>

        <div class="ms-auto">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm">Logout</button>
                </form>
            @endauth
        </div>
    </nav>
@section('content')
    <h2>Edit Contact</h2>
    <form method="POST" action="{{ route('contacts.update', $contact->id) }}"enctype="multipart/form-data">
        @csrf
        <input class="form-control mb-2" name="name" value="{{ $contact->name }}" required>
        <input class="form-control mb-2" name="email" type="email" value="{{ $contact->email }}" required>
        <input class="form-control mb-2" name="phone" value="{{ $contact->phone }}" required>
        @if($contact->photo)
        <p>Current Photo:</p>
        <img src="{{ asset('storage/' . $contact->photo) }}" width="120" class="mb-2">
    @endif
    <input type="file" name="photo" class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
