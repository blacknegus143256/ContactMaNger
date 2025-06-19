@extends('layout')

@section('content')
<style>
    body {
        background: linear-gradient(90deg, #0052cc, #007bff);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-wrapper {
        background: white;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        max-width: 900px;
        width: 100%;
    }

    .welcome-section {
        background: linear-gradient(135deg, #004aad, #007aff);
        color: white;
        padding: 40px;
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-section {
        padding: 40px;
        width: 50%;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-primary {
        background-color: #003e99;
        border: none;
        border-radius: 8px;
    }

    .btn-outline-secondary {
        border-radius: 8px;
    }

    .form-section p a {
        color: #007bff;
        text-decoration: none;
    }
</style>

<div class="login-wrapper">
    <div class="welcome-section text-center">
        <h2>WELCOME</h2>
        <p>Contact Manager</p>
        <p>By: Arvin R. Faburada</p>
        <p>Neil Rey R. Albopera</p>
        <p>Patrick B. Corda</p>
    </div>

    <div class="form-section">
        <h3 class="mb-4">Sign in</h3>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="User Name" required>
            </div>

            <div class="mb-3 position-relative">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                {{-- You may add JS toggle for show/hide password --}}
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <input type="checkbox" name="remember"> Remember me
                </div>
                <a href="#">Forgot Password?</a>
            </div>

            <button class="btn btn-primary w-100 mb-2">Sign in</button>

            <div class="text-center my-2">OR</div>

            <button type="button" class="btn btn-outline-secondary w-100 mb-3">Sign in with other</button>
        </form>

        <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
    </div>
</div>
@endsection
