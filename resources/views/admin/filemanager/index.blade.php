@extends('adminlte::page')

@section('title', __('media.title_filemanager'))

@section('content_header')
    <x-breadcrumbs title="{{ __('media.title_filemanager') }}" currentActive="{{ __('media.title_filemanager') }}"/>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div style="height: 600px;">
            <div id="fm"></div>
        </div>
    </div>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@include('layouts.partials._switch_lang')
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
