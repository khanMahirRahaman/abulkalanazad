<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    @include('frontend.magz.inc._head')
</head>

<body class="skin-orange">
<!-- Header -->
<header class="primary">
    @include('frontend.magz.template-parts.header')
</header>

<!-- Content -->
<section class="not-found">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="code">
                    @yield('code')
                </div>
                <h1 class="text-center">@yield('title')</h1>
                <p class="lead">@yield('message')</p>
            </div>
        </div>
    </div>
</section>

<!-- Start footer -->
<footer class="footer">
    @include('frontend.magz.template-parts.footer')
</footer>
<!-- End Footer -->

<!-- JS -->
@include('frontend.magz.inc._scripts')
</body>
</html>

