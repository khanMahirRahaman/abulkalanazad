@extends('adminlte::page')

@section('title', __('user.title_users'))

@section('content_header')
    <x-breadcrumbs title="{{ __('user.title_users') }}" currentActive="{{ __('user.title_users') }}"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.partials._table')
        </div>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    @include('layouts.partials._datatables')
    @include('layouts.partials._switch_lang')
    @include('layouts.partials._notification')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
