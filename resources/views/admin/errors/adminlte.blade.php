@extends('adminlte::page')

@section('title')
    @yield('title')
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('dashboard.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning">@yield('code')</h2>

            <div class="error-content">
                <h3>@yield('info')</h3>

                <p>
                    @yield('message')
                </p>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
    <style>
        .error-page > .headline {
            margin-top: -20px;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('vendor/croppie/croppie.min.js') }}"></script>
    @include('layouts.partials._switch_lang')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
