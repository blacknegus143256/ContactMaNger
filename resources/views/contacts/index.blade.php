@extends('layout')

@section('content')
    <h2>Contacts</h2>
    <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
        @foreach($contacts as $c)
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
        @endforeach
    </table>
@endsection
