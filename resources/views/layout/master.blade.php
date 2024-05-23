<!DOCTYPE html>
<html lang="en">
<head>
    <title>AO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- css link -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- box icons link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
@if (Auth::check())
<!-- header design -->
<header class="header">
    <a href="{{ url('/home') }}" class="logo">AO</a>

    <i class='bx bx-menu' id="menu-icon"></i>

    <nav class="navbar">
    <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'active' : '' }}">Home</a>
    <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
    <a href="{{ url('/portfolio') }}" class="{{ Request::is('portfolio') ? 'active' : '' }}">Portfolio</a>
    <a href="{{ url('/comment') }}" class="{{ Request::is('comment') ? 'active' : '' }}">Comment</a>

        <a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
    </nav>
</header>
@else
<header class="header">
    <a href="{{ url('/home') }}" class="logo">AO</a>

    <i class='bx bx-menu' id="menu-icon"></i>

    <nav class="navbar">
    <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'active' : '' }}">Home</a>
    <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
    <a href="{{ url('/portfolio') }}" class="{{ Request::is('portfolio') ? 'active' : '' }}">Portfolio</a>
    <a href="{{ url('/comment') }}" class="{{ Request::is('comment') ? 'active' : '' }}">Comment</a>

        <a href="{{ url('/login') }}" class="{{ Request::is('login') ? 'active' : '' }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
    </nav>
</header>
@endif

@yield('container')

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>