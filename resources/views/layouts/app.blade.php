<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AT10 Food Store')</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #2ecc71;
            --dark-green: #27ae60;
            --light-green: #ebfaf0;
            --bg-color: #f8fcf9;
            --text-color: #2c3e50;
            --white: #ffffff;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: var(--white);
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--dark-green) !important;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand span {
            color: var(--text-color);
            margin-right: 5px;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-color);
            margin-left: 1.5rem;
            transition: color 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-green);
        }

        .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--dark-green);
            border-color: var(--dark-green);
        }

        .category-tab {
            display: inline-block;
            padding: 10px 25px;
            background: var(--white);
            border-radius: 50px;
            margin: 5px;
            color: var(--text-color);
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .category-tab:hover, .category-tab.active {
            background: var(--primary-green);
            color: var(--white);
            transform: translateY(-2px);
        }

        .food-card {
            background: var(--white);
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .food-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(46, 204, 113, 0.1);
        }

        .image-container {
            width: 100%;
            height: 200px;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 15px;
            background: var(--light-green);
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-green);
        }

        .food-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .card-footer-btns {
            margin-top: auto;
        }

        footer {
            background: var(--white);
            padding: 2rem 0;
            text-align: center;
            border-top: 1px solid #f0f0f0;
            margin-top: 4rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('foods.index') }}">
            <span>AT10</span> Food Store
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('foods.index') ? 'active' : '' }}" href="{{ route('foods.index') }}">{{ __('messages.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('messages.categories') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('messages.about') }}</a>
                </li>
                <li class="nav-item dropdown ms-lg-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item {{ app()->getLocale() == 'vi' ? 'active bg-success' : '' }}" href="{{ route('locale.change', 'vi') }}">TIẾNG VIỆT</a></li>
                        <li><a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active bg-success' : '' }}" href="{{ route('locale.change', 'en') }}">ENGLISH</a></li>
                    </ul>
                </li>
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('foods.create') }}" class="btn btn-primary">{{ __('messages.add_product') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

<footer>
    <div class="container">
        <p class="m-0 text-muted">&copy; 2026 AT10 Food Store. Designed for Midterm PHP.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
