<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="index, follow">
<meta name="author" content="{{ Settings::key('company_name') }}">
{!! SEO::generate() !!}
@empty(Settings::key('favicon'))
<link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
@else
<link rel="icon" sizes="32x32" href="{{ route('icon.display', Settings::key('favicon')) }}">
@endempty
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('themes/magz/scripts/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/scripts/ionicons/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/scripts/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/scripts/toast/jquery.toast.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/scripts/owlcarousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/scripts/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/scripts/magnific-popup/dist/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/scripts/sweetalert/dist/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/css/skins/all.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<link rel="stylesheet" href="{{ asset('css/custom-css.css') }}">
@if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
<link rel="stylesheet" href="{{ asset('themes/magz/css/rtl.css') }}">
@endif
<link rel="stylesheet" href="{{ asset('vendor/prism.js/prism.css') }}">
<link rel="stylesheet" href="{{ asset('themes/magz/css/progress.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/flag-icons/css/flag-icons.min.css') }}">



<!-- Mailchimp -->


{!! NoCaptcha::renderJs() !!}
