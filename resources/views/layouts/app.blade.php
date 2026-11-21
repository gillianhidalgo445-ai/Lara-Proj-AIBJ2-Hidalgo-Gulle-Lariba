<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IronCore Fitness')</title>

    {{-- Shared styles for every page --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Each page pushes its own CSS file here --}}
    @stack('styles')
</head>
<body>

    <header class="site-header">
        <a href="{{ route('home') }}" class="brand" aria-label="IronCore Fitness home">IRON<span>CORE</span></a>

        <nav class="main-nav" aria-label="Main navigation">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </nav>

        <div class="header-actions">
            <a href="{{ route('contact') }}" class="btn btn-accent btn-sm">Join now</a>
            <button type="button" id="themeToggle" class="pill-btn">Light mode</button>
        </div>
    </header>

    <main>
        {{-- Each page's content goes here --}}
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-col">
                <h4>Explore</h4>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About us</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
            <div class="footer-col">
                <h4>Train</h4>
                <a href="{{ route('home') }}#classes">Book a class</a>
                <a href="{{ route('home') }}#plans">Membership plans</a>
            </div>
            <div class="footer-col">
                <h4>Visit</h4>
                <p>Butuan City, Agusan del Norte</p>
                <p>Mon to Sat, 5:00 AM to 10:00 PM</p>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <p>hello@ironcore.example</p>
                <p>+63 900 000 0000</p>
            </div>
        </div>
        <p class="footer-wordmark" aria-hidden="true">IRONCORE</p>
        <p class="footer-note">&copy; 2026 IronCore Fitness. Built by Gillian Hidalgo, Lorraine Jade Gulle and Paul Jyrich Lariba.</p>
    </footer>

    {{-- Shared script (light/dark mode), then each page's own script --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
