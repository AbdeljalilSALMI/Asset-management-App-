@extends('layout') <!-- Use your layout -->

@section('content')
<!-- Reset Password Container -->
<div class="auth-container">
    <h2 class="text-center mb-4 text-white">Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ $email ?? old('email') }}" 
                   required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback d-block mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group mb-3">
            <label for="password" class="form-label">New Password</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback d-block mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group mb-3">
            <label for="password-confirm" class="form-label">Confirm Password</label>
            <input id="password-confirm" type="password"
                   class="form-control"
                   name="password_confirmation" required autocomplete="new-password">
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-login w-100">
            {{ __('Reset Password') }}
        </button>
    </form>
</div>

<style>
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
        background: #fff;
        width: 100%;
        max-width: 450px;
        border-radius: 15px;
        padding: 2.5rem;
        margin-top: 100px; /* if navbar exists */
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
