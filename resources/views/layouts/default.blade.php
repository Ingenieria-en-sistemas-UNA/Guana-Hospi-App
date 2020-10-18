<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body class="grid-container">
    <header class="header-layout">
        @include('includes.header')
    </header>
    <nav class="navbar-layout bg-dark">
        <ul class="nav-items-container nav nav-pills">
            @include('includes.sidebar')
        </ul>
    </nav>
    <article class="main-layout container-fluid">
        @yield('content')
    </article>
</body>

</html>
