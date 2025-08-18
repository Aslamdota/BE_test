<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background: #1e293b;
            color: #fff;
            padding: 20px 0;
        }
        .sidebar .nav-link {
            color: #cbd5e1;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            border-radius: 8px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: #334155;
            color: #fff;
        }
        .sidebar .nav-link i {
            margin-right: 12px;
        }
        .sidebar-footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
        .main-content {
            padding: 30px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-grow-1">
        <nav class="navbar navbar-light bg-white border-bottom shadow-sm px-4">
            <span class="fw-bold">MyApp</span>
        </nav>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
