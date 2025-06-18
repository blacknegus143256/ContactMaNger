@extends('layout')

@section('content')
    <h2>Edit Contact</h2>
    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
        @csrf
        <input class="form-control mb-2" name="name" value="{{ $contact->name }}" required>
        <input class="form-control mb-2" name="email" type="email" value="{{ $contact->email }}" required>
        <input class="form-control mb-2" name="phone" value="{{ $contact->phone }}" required>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
