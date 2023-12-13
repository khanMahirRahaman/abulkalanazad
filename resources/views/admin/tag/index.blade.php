@extends('adminlte::page')

@section('title', __('term.title_tags'))

@section('content_header')
    <x-breadcrumbs title="{{ __('term.title_tags') }}" currentActive="{{ __('term.title_tags') }}"/>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('admin.tag._create')
    </div>
    <div class="col-md-8">
        @include('admin.tag._table')
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
    @include('admin.tag._script')
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
