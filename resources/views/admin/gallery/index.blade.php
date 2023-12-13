@extends('adminlte::page')

@section('title', __('media.title_galleries'))

@section('content_header')
    <x-breadcrumbs title="{{ __('media.title_galleries') }}" currentActive="{{ __('media.title_galleries') }}"/>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('admin.gallery._create')
        @include('layouts.partials._table')
    </div>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
<script src="{{ asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@include('layouts.partials._datatables')
@include('layouts.partials._switch_lang')
@include('layouts.partials._notification')

@if($errors->has('file'))
<script>
    toastr.error("{{ $errors->first('file') }}")
</script>
@endif
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
