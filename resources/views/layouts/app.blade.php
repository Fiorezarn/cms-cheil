<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CMS') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-logo {
            height: 40px;
            width: auto;
            margin-right: 12px;
            filter: brightness(0) invert(1);
        }

        .navbar-logo-fallback {
            height: 40px;
            width: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-weight: bold;
            color: #333;
            font-size: 18px;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #fff;
        }

        .navbar-dark .navbar-brand {
            color: #fff;
            font-weight: 600;
        }

        .navbar-dark .navbar-brand:hover {
            color: #fff;
        }

        /* Styling untuk dropdown */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            transition: background-color 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            .navbar-logo {
                height: 35px;
                margin-right: 8px;
            }

            .navbar-nav {
                margin-top: 0.5rem;
            }
        }

        .alert {
            border: none;
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Cheil Logo" class="navbar-logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-expanded="false"
                    aria-controls="navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                    href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                                </a>
                            </li>
                            @if (Auth::user()->isSuperUser())
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                                        href="{{ route('users.index') }}">
                                        <i class="fas fa-users me-1"></i>Users
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt me-1"></i>Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus me-1"></i>Register
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <h6 class="dropdown-header">
                                        <i class="fas fa-user me-1"></i>{{ Auth::user()->email }}
                                    </h6>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>{{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
