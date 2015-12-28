<!doctype html>
<html lang="en">
<head>
    @include('layout.header')
</head>
<body>
    @include('layout.nav')
    @yield('page-header')
    <div class="container">
        @yield('content')
    </div>

    @include('layout.footer')
</body>
</html>