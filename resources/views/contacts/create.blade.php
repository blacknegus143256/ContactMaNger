@extends('dashboard-layout')

@section('content')
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Back</a>
    <h2>Add Contact</h2>
    <form method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
        <input class="form-control mb-2" name="name" placeholder="Name" required>
        </div>

        <div class="mb-3">
        <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
        </div> 

        <div class="mb-3">
        <input class="form-control mb-2" name="phone" placeholder="Phone" required>
        </div>

        <div class="mb-3">
        <input type="file" name="photo" class="form-control mb-2">
        </div>

        <button class="btn btn-success">Save</button>

        
    </form>
@endsection
