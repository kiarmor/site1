<!doctype html>
<html lang="en">
<head>
        <title>@yield('title')</title>

    <!-- Подключаем Bootstrap CSS -->
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />--}}

</head>
<body>


        <a href="/">Home page</a>
        <a href="/news">News</a>
        <a href="/about">About Us</a>
        <a href="contact">Contact</a>
        <a href="/posts">Posts</a>
        <a href="/products">Products</a>
        <a href="/home">Login</a>





        @yield('content')


        <a href="/">How to find us.</a>


</body>
</html>



