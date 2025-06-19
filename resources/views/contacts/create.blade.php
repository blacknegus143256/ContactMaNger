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
    <h2>Add Contact</h2>
    <form method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
        @csrf
        <input class="form-control mb-2" name="name" placeholder="Name" required>
        <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
        <input class="form-control mb-2" name="phone" placeholder="Phone" required>
        <input type="file" name="photo" class="form-control mb-2">
        <button class="btn btn-success">Save</button>
    </form>
@endsection
