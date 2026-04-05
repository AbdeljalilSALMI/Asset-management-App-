<!DOCTYPE html>
<html lang="en">
<head>
    
    <nav class="navbar navbar-dark fixed-top"  style= "background-color: #1a934dff;">
        <div class="container-fluid">
            <a class="navbar-brand" style ="font :bold;" href="#">Asset Management</a>
            <a class="nav-link" href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#A7C4E5"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>logout</a>
        </div>
    </nav>
    <meta charset="UTF-8">
    <title>Asset Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        
        body {
            display: flex;
            min-height: 100vh;
        }
        .nav-link {
            color: #adb5bd;
            font: 1em sans-serif;
            text-align: center;
            background: #1a934dff;
            height: 35px;
            width: 80px;
            border-radius: 5px;
            border: transparent;
        }
        .nav-link:hover, .nav-link.active {
            color: red;
            background-color: rgb(0,0,0);
        }
        .sidebar {
            width: 240px;
            background-color: #2e3c4aff;
            color: white;
            padding: 20px 0;
        }
        .sidebar a {
            color: #adb5bd;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
            color: white;
        }
        .main-content {
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="text-center mb-4">Admin Panel</h4>
        <a href="{{ route('employee.dashboard') }}" class="{{ request()->is('/employee/dashboard') ? 'active' : '' }}"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#A7C4E5"><path d="M0-160v-80h160v-40q-33 0-56.5-23.5T80-360v-400q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v400q0 33-23.5 56.5T800-280v40h160v80H0Zm160-200h640v-400H160v400Zm0 0v-400 400Z"/></svg> Your assets</a>
        <a href="{{ route('employee.report') }}" class="{{ request()->is('/employee/report') ? 'active' : '' }}"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#A7C4E5"><path d="m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Zm580-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-500-20h160v-160H200v160Zm202-420h156l-78-126-78 126Zm78 0ZM360-340Zm340 80Z"/></svg> Your reports</a>
        </div>

    <div class="main-content">
        @yield('content')
    
</body>
</html>
