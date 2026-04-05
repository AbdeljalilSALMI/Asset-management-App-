@extends('layout') <!-- Use your layout -->

@section('content')
<!-- Navbar -->
<nav class="navbar">
    <div class="nav-container">
        <h1 class="nav-logo">Asset Management App</h1>
        <ul class="nav-links">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('registration') }}">Register</a></li>
        </ul>
    </div>
</nav>

<div class="auth-container">
    <h2 class="text-center mb-4 text-white">Reset Password</h2>

    @if (session('status'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required 
                   autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback d-block mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn-login w-100">
            {{ __('Send Password Reset Link') }}
        </button>
    </form>
</div>

<style>
    /* ===== Navbar ===== */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.65);
        backdrop-filter: blur(12px);
        padding: 1rem 2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .nav-container {
        width: 100%;
        max-width: 1200px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
    }

    .nav-logo {
        font-size: 1.5rem;
        font-weight: 700;
        color: #fff;
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 2rem;
        margin: 0;
        padding: 0;
    }

    .nav-links li a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }

    .nav-links li a:hover {
        color: #00f2fe;
    }

    /* ===== Page Background ===== */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: linear-gradient(135deg, #0d733bff, #020d31ff);
    }

    /* ===== Auth Container (Card) ===== */
    .auth-container {
        background: linear-gradient(135deg, #0d733bff, #020d31ff);
        width: 100%;
        max-width: 450px;
        border-radius: 15px;
        padding: 2.5rem;
        margin-top: 100px; /* To avoid navbar overlap */
        box-shadow: 0 0 15px rgba(24, 78, 206, 0.6);
    }

    /* ===== Button ===== */
    .btn-login {
        background: linear-gradient(135deg, #298709ff, #4ff380d5);
        border: none;
        border-radius: 25px;
        padding: 0.75rem 2rem;
        color: white;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
</style>
@endsection
