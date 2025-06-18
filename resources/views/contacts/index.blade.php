@extends('layout')

@section('content')
    <h2>Contacts List</h2>
    <form method="GET" action="{{ route('contacts.index') }}" class="mb-3 d-flex">
    <input type="text" name="search" class="form-control me-2" placeholder="Search contacts..." value="{{ $search ?? '' }}">
    <button type="submit" class="btn btn-primary">Search</button>
</form>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
        @forelse($contacts as $c)
    <tr>
        <td>{{ $c->name }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
        <td>
            <a href="{{ route('contacts.edit', $c->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <a href="{{ route('contacts.destroy', $c->id) }}" class="btn btn-sm btn-danger"
                onclick="return confirm('Delete this contact?')">Delete</a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center">No contacts found.</td>
    </tr>
@endforelse
    </table>
@endsection
