<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Asset Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* ===== Navbar ===== */
        .navbar {
            background-color: #1a934dff !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #ffffff !important;
            font-size: 0.95rem;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease-in-out;
        }

        .nav-link svg {
            vertical-align: middle;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffeb3b !important;
        }

        /* ===== Sidebar ===== */
        .sidebar {
            width: 245px;
            background: linear-gradient(180deg, #2e3c4aff, #1c262f);
            color: white;
            padding-top: 75px; /* space for fixed navbar */
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0,0,0,0.3);
        }

        .sidebar h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #ffffff;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #adb5bd;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

        .sidebar a svg {
            flex-shrink: 0;
        }

        .sidebar a:hover {
            background-color: #1a934dff;
            color: #fff;
            transform: translateY(4px);
        }

        .sidebar a.active {
            background-color: #1a934dff;
            color: #fff;
            font-weight: 600;
        }

        /* ===== Main Content ===== */
        .main-content {
            margin-left: 240px;
            padding: 100px 40px 40px;
            flex: 1;
            background-color: #f8f9fa;
            min-height: 100vh;
            transition: all 0.3s ease-in-out;
        }

        /* Scrollbar Style */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #1a934dff;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #2e3c4aff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Asset Management</a>
            <a class="nav-link" href="{{ route('login') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="#fff">
                    <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 
                    23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 
                    102-102H360v-80h327L585-622l55-58 200 
                    200-200 200Z"/>
                </svg>
                Logout
            </a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Supplier Panel</h4>
        <a href="{{ route('supplierhandle.index') }}" class="{{ request()->is('/supplier/main') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#A7C4E5"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
            Demandes
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>
