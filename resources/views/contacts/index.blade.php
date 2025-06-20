@extends('dashboard-layout')
 
@section('content')
<h2 class="mb-3">Contacts</h2>

<form method="GET" action="{{ route('contacts.index') }}" class="mb-4 d-flex">
    <input type="text" name="search" class="form-control me-2" placeholder="Search contacts..." value="{{ $search ?? '' }}">
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<div class="d-flex justify-content-end mb-3">
<a href="{{ route('contacts.create') }}" class="btn btn-success mb-4">Add Contact</a>
</div>

<div class="row">
    @forelse($contacts as $contact)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                @if($contact->photo)
                    <img src="{{ asset('storage/' . $contact->photo) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/400x200?text=No+Photo" class="card-img-top">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $contact->name }}</h5>
                    <p class="card-text">
                        {{ $contact->email }}<br>
                        {{ $contact->phone }}
                    </p>
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('contacts.destroy', $contact->id) }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
        </div>
    @empty
        <p>No contacts found.</p>
    @endforelse
</div>
@endsection
