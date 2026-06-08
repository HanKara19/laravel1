<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Shop')</title>
    <meta name="keywords" content="@yield('keywords', 'shop, ecommerce, products')">
    <meta name="description" content="@yield('description', 'Best e-commerce website')">

    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    @stack('head')
</head>

<body>
    @include('front.header')

    @include('front.menu')

    @yield('slider')

    <main>
        @yield('content')
    </main>

    @include('front.footer')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>