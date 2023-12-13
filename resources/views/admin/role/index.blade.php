@extends('adminlte::page')

@section('title', __('role.title_roles'))

@section('content_header')
    <x-breadcrumbs title="{{ __('role.title_roles') }}" currentActive="{{ __('role.title_roles') }}"/>
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
