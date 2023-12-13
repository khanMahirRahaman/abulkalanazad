@extends('adminlte::page')

@section('title', __('localization.title_translations'))

@section('content_header')
    <x-breadcrumbs title="{{ __('localization.title_translations') }}" currentActive="{{ __('localization.title_translations') }}"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.translation._table')
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
    @include('admin.translation._script')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
