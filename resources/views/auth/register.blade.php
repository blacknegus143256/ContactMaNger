@extends('layout')

@section('content')
<h2>Register</h2>
@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
    <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Confirm Password" required>
    <button class="btn btn-success">Register</button>
</form>
<p class="mt-2">Already have an account? <a href="{{ route('login') }}">Login</a></p>
@endsection
