@extends('layout')

@section('content')
<h2>Login</h2>
@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
    <button class="btn btn-primary">Login</button>
</form>
<p class="mt-2">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection
