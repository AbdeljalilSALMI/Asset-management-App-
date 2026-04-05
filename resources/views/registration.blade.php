@extends('layout')
@section('title', 'Register Page')
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

<div class="register-container">
    <form method="POST" action="{{ route('registration.post') }}" class="register-form">
        @csrf
        <h2 class="register-title">Create an Account </h2>

        <!-- Role Selection -->
        <div class="form-group mb-3">
            <label><strong>Select Role:</strong></label><br>
            <input type="radio" name="role" value="employee" id="roleEmployee" checked> Employee
            <input type="radio" name="role" value="supplier" id="roleSupplier" class="ms-3"> Supplier
        </div>

        <!-- Common Fields -->
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control custom-input" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control custom-input" required>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control custom-input" required>
        </div>

        <div class="form-group mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control custom-input" required>
        </div>

        <!-- Employee Fields -->
        <div id="employeeFields" class="d-none">
            <div class="form-group mb-3">
                <label>Function</label>
                <input type="text" name="function" class="form-control custom-input">
            </div>

            <div class="form-group mb-3">
                <label>Department</label>
                <select name="department_id" class="form-control custom-input">
                    <option value="">-- Select Department --</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Supplier Fields -->
        <div id="supplierFields" class="d-none">
            <div class="form-group mb-3">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control custom-input">
            </div>
        </div>

        <button type="submit" class="btn-register">Register</button>
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

    /* ===== Register Form ===== */
    .register-container {
        width: 100%;
        max-width: 480px;
        margin-top: 120px; /* space for navbar */
        padding: 20px;
    }

    .register-form {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        color: #fff;
        animation: fadeIn 0.8s ease-in-out;
    }

    .register-title {
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        font-weight: 600;
        text-align: center;
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

    .btn-register {
        background: linear-gradient(135deg, #298709ff, #4ff380d5);
        border: none;
        border-radius: 25px;
        padding: 0.75rem 2rem;
        color: white;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        display: block;
        width: 100%;
        margin-top: 1rem;
        transition: transform 0.2s, box-shadow 0.3s;
    }

    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 244, 138, 0.4);
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const employeeRadio = document.getElementById("roleEmployee");
        const supplierRadio = document.getElementById("roleSupplier");

        const employeeFields = document.getElementById("employeeFields");
        const supplierFields = document.getElementById("supplierFields");

        function toggleFields() {
            if (employeeRadio.checked) {
                employeeFields.classList.remove("d-none");
                supplierFields.classList.add("d-none");
            } else if (supplierRadio.checked) {
                supplierFields.classList.remove("d-none");
                employeeFields.classList.add("d-none");
            } else {
                employeeFields.classList.add("d-none");
                supplierFields.classList.add("d-none");
            }
        }

        employeeRadio.addEventListener("change", toggleFields);
        supplierRadio.addEventListener("change", toggleFields);

        toggleFields();
    });
</script>
@endsection
