@extends('dashboard-layout')

@section('content')
    <h2 class="mb-4 text-center">Edit Contact</h2>

    <form method="POST" action="{{ route('contacts.update', $contact->id) }}"enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
        <input class="form-control mb-2" name="name" value="{{ $contact->name }}" required>
        </div>

        <div class="mb-3">
        <input class="form-control mb-2" name="email" type="email" value="{{ $contact->email }}" required>
        </div>

        <div class="mb-3">
        <input class="form-control mb-2" name="phone" value="{{ $contact->phone }}" required>
        </div>


        @if($contact->photo)
        <div class="mb-3">
        <p class="mb-1 fw-bold">Current Photo:</p>
        <img src="{{ asset('storage/' . $contact->photo) }}" width="120" class="rounded shadow-sm mb-2">
        </div>
    @endif
    <div class="mb-3">
    <input type="file" name="photo" class="form-control">
    </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
