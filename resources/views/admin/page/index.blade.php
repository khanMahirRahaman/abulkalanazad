@extends('adminlte::page')

@section('title', __('page.title_pages'))

@section('content_header')
    <x-breadcrumbs title="{{ __('page.title_pages') }}" currentActive="{{ __('page.title_pages') }}"/>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.page._table')
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
    <script>
        "use strict";
        var items = "";
        $.getJSON("{{ route('getdatalanguage') }}", function (result) {
            $.each(result, function (i, item) {
                if (item.language_code == "{{ Auth::user()->language }}") {
                    items += "<option value='" + item.id + "' selected>" + item.language + "</option>";
                } else {
                    items += "<option value='" + item.id + "'>" + item.language + "</option>";
                }
            });
            $("#custom-filter").html(items);
        });
    </script>
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
