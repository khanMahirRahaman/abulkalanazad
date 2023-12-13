<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    @include('frontend.magz.inc._head')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body class="{{ $theme . '-theme' }} skin-orange">
    <!-- Header -->
    <header class="primary">
        @include('frontend.magz.template-parts.header')
    </header>

    <!-- Content -->
    @yield('content')




    <!-- Start footer -->
    <footer class="footer">
        @include('frontend.magz.template-parts.footer')
    </footer>
    <!-- End Footer -->

    <!-- JS -->
    @include('frontend.magz.inc._scripts')
</body>

</html>
