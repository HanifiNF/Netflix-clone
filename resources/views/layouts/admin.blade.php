<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Vidlix</title>

    <link href="https://fonts.bunny.net/css?family=nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body { background-color:#191919; }
        .admin-sidebar {
            position: fixed; top: 0; left: 0; width: 240px; height: 100vh;
            background:#100C08; padding-top: 24px; z-index: 1020;
            border-right: 1px solid #2a2a2a; overflow-y: auto;
        }
        .admin-sidebar .brand {
            color:#fff; font-weight:bold; font-size:1.25rem; padding: 0 20px 24px;
            border-bottom: 1px solid #2a2a2a; margin-bottom: 16px; display:block;
        }
        .admin-sidebar a.nav-link {
            display:flex; align-items:center; color:#d1d1d1; padding:12px 20px;
            text-decoration:none; border-left:3px solid transparent; transition: all 0.15s;
        }
        .admin-sidebar a.nav-link:hover { background:#1f1c1a; color:#fff; }
        .admin-sidebar a.nav-link.active {
            background:#1f1c1a; color:#fff; border-left-color:#e50914;
        }
        .admin-sidebar a.nav-link i { width: 22px; margin-right: 10px; text-align:center; }
        .admin-sidebar .divider { border-top:1px solid #2a2a2a; margin: 12px 16px; }
        .admin-content { margin-left: 240px; padding: 32px; min-height: 100vh; }
        .admin-topbar {
            display:flex; justify-content:space-between; align-items:center;
            margin-bottom: 32px; padding-bottom: 16px; border-bottom: 1px solid #2a2a2a;
        }
        .admin-topbar h1 { color:#fff; margin:0; font-size:1.75rem; font-weight:600; }
        .stat-card {
            background:#100C08; border:1px solid #2a2a2a; border-radius: 10px;
            padding: 24px; color:#fff; transition: transform 0.15s;
        }
        .stat-card:hover { transform: translateY(-3px); }
        .stat-card .stat-icon {
            width: 56px; height: 56px; border-radius: 12px;
            display:flex; align-items:center; justify-content:center; font-size: 1.5rem;
            margin-bottom: 12px;
        }
        .stat-card .stat-value { font-size: 2.25rem; font-weight: 700; line-height: 1; }
        .stat-card .stat-label { color:#a0a0a0; font-size: 0.95rem; margin-top: 6px; }
        .tile-card {
            background:#100C08; border:1px solid #2a2a2a; border-radius: 10px;
            padding: 28px; color:#fff; height: 100%; transition: all 0.15s;
            text-decoration:none; display:block;
        }
        .tile-card:hover {
            transform: translateY(-4px); border-color:#e50914;
            text-decoration:none; color:#fff;
        }
        .tile-card .tile-icon {
            width: 64px; height: 64px; border-radius: 12px;
            display:flex; align-items:center; justify-content:center; font-size: 1.75rem;
            margin-bottom: 16px;
        }
        .tile-card h3 { color:#fff; margin-bottom:8px; font-weight:600; }
        .tile-card p { color:#a0a0a0; margin-bottom: 16px; }
        .tile-card .btn-open {
            display:inline-block; padding: 8px 16px; background:#e50914;
            color:#fff; border-radius:6px; font-size: 0.9rem; font-weight:500;
        }
        @media (max-width: 768px) {
            .admin-sidebar { width: 100%; height: auto; position: relative; }
            .admin-content { margin-left: 0; padding: 16px; }
        }
    </style>
</head>
<body>
    <aside class="admin-sidebar">
        <span class="brand">
            <i class="fas fa-cog me-2"></i> Vidlix Admin
        </span>

        <a href="{{ route('admin.dashboard') }}"
           class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('database') }}"
           class="nav-link @if(request()->routeIs('database')) active @endif">
            <i class="fas fa-users"></i> Users
        </a>
        <a href="{{ route('movdatabase') }}"
           class="nav-link @if(request()->routeIs('movdatabase')) active @endif">
            <i class="fas fa-film"></i> Movies
        </a>
        <a href="{{ route('form') }}"
           class="nav-link @if(request()->routeIs('form')) active @endif">
            <i class="fas fa-upload"></i> Upload
        </a>

        <div class="divider"></div>

        <a href="{{ route('home') }}" class="nav-link">
            <i class="fas fa-home"></i> Back to site
        </a>
        <a href="{{ route('logout') }}" class="nav-link"
           onclick="event.preventDefault(); document.getElementById('admin-logout').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="admin-logout" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </aside>

    <main class="admin-content">
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>