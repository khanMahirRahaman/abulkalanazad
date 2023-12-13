@extends('adminlte::page')

@section('title', __('socialmedia.title_socialmedia'))

@section('content_header')
    <x-breadcrumbs title="{{ __('socialmedia.title_socialmedia') }}" currentActive="{{ __('socialmedia.title_socialmedia') }}"/>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('admin.socialmedia._create')
    </div>
    <div class="col-md-8">
        @include('layouts.partials._table')
    </div>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-iconpicker/css/fontawesome-iconpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('vendor/fontawesome-iconpicker/js/fontawesome-iconpicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    @include('layouts.partials._datatables')
    @include('layouts.partials._switch_lang')
    @include('layouts.partials._notification')
    @include('admin.socialmedia._script')

    <script>
        $(function () {
            $('.icp-auto').iconpicker();
            $('#cp2').colorpicker();
        });
    </script>
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
