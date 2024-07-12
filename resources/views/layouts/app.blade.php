<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            left: -250px;
            top: 0;
            height: 100%;
            width: 250px;
            background: #2c3e50;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        .sidebar.active {
            left: 0;
        }
        .sidebar .logo {
            padding: 20px;
            color: white;
            font-size: 24px;
            font-weight: 600;
        }
        .sidebar nav a {
            display: block;
            padding: 15px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidebar nav a:hover {
            background: #34495e;
        }
        .main-content {
            margin-left: 0;
            transition: all 0.3s ease;
        }
        .main-content.sidebar-active {
            margin-left: 250px;
        }
        .navbar {
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
            padding: 10px 0;
        }
        .navbar .navbar-brand {
            color: #333;
            font-size: 22px;
            font-weight: 600;
        }
        .navbar .nav-link {
            color: #555 !important;
        }
        #sidebarToggle {
            background: none;
            border: none;
            font-size: 24px;
            color: #555;
            cursor: pointer;
        }
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 999;
        }
        .overlay.active {
            display: block;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
        .dropdown-item {
            padding: 10px 20px;
            color: #333;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
        @media (max-width: 768px) {
            .main-content.sidebar-active {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    @auth
    <div id="overlay" class="overlay"></div>
    <aside id="sidebar" class="sidebar">
        <div class="logo">{{ config('app.name', 'StunMap') }}</div>
        <nav>
            <a href="/"><i class="fas fa-home"></i> Home</a>
            @if (Auth::user()->role)
                <a href="{{ route('data.superadminindex') }}"><i class="fas fa-map"></i> Kecamatan</a>
            @endif
            @if (Auth::user()->role === 'superadmin')
                <a href="{{ route('users.index') }}"><i class="fas fa-user-plus"></i> {{ __('Register user') }}</a>
            @endif
        </nav>
    </aside>
    @endauth

    <div id="mainContent" class="main-content">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                @auth
                <button id="sidebarToggle" class="me-3"><i class="fas fa-bars"></i></button>
                @endauth
                <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'StunMap') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                                    <i class="fas fa-id-card"></i> {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @auth
    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('mainContent');

        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            mainContent.classList.toggle('sidebar-active');
        }

        document.getElementById('sidebarToggle').addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Close sidebar on window resize if it's open (for responsiveness)
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && sidebar.classList.contains('active')) {
                toggleSidebar();
            }
        });
    </script>
    @endauth
</body>
</html>