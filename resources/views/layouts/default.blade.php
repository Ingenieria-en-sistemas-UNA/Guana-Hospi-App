<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
</head>

<body class="grid-container">
    <header class="header-layout sticky-top shadow-lg rounded">
        @include('includes.header')
    </header>
    <nav class="navbar-layout bg-dark h-100">
        <ul class="nav-items-container nav nav-pills">
            @include('includes.sidebar')
        </ul>
    </nav>
    <article class="main-layout container-fluid h-100 overflow-auto">
        @yield('content')
    </article>
</body>

</html>
