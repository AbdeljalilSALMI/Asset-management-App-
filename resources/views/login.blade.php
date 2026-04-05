@extends('layout')
@section('title', 'Login Page')
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

<div class="login-container">
    <form action="{{ route('login.post') }}" method="POST" class="login-form">
        @csrf
        <h2 class="login-title">Welcome Back </h2>

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control custom-input" name="email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control custom-input" name="password" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn-login">Login</button>

        @if (Route::has('password.request'))
        <a class="forgot-password" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </form>
</div>

<style>
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

    /* ===== Login Form ===== */
    .login-container {
        width: 100%;
        max-width: 420px;
        margin-top: 120px; /* add spacing for fixed navbar */
        padding: 20px;
    }

    .login-form {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        color: #fff;
        text-align: center;
        animation: fadeIn 0.8s ease-in-out;
    }

    .login-title {
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        font-weight: 600;
        color: #ffffff;
    }

    .custom-input {
        border-radius: 10px;
        border: none;
        padding: 0.75rem;
        font-size: 1rem;
        transition: all 0.3s ease-in-out;
    }

    .custom-input:focus {
        outline: none;
        box-shadow: 0 0 8px #4facfe;
        border: 1px solid #4facfe;
    }

    .btn-login {
        background: linear-gradient(135deg, #298709ff, #4ff380d5);
        border: none;
        border-radius: 25px;
        padding: 0.75rem 2rem;
        color: white;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        margin-top: 1rem;
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 244, 138, 0.4);
    }

    .forgot-password {
        display: block;
        margin-top: 1.2rem;
        color: #f1f1f1;
        text-decoration: none;
        transition: color 0.3s;
    }

    .forgot-password:hover {
        color: #00f2fe;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
@endsection
