@extends('layout')

@section('content')
    <h2>Add Contact</h2>
    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf
        <input class="form-control mb-2" name="name" placeholder="Name" required>
        <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
        <input class="form-control mb-2" name="phone" placeholder="Phone" required>
        <button class="btn btn-success">Save</button>
    </form>
@endsection
