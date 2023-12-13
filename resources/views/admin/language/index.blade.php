@extends('adminlte::page')

@section('title', __('localization.title_languages'))

@section('content_header')
    <x-breadcrumbs title="{{ __('localization.title_languages') }}" currentActive="{{ __('localization.title_languages') }}"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('admin.language._create')
        </div>
        <div class="col-md-8">
            @include('layouts.partials._table')
        </div>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    @include('layouts.partials._notification')
    @include('layouts.partials._datatables')
    @include('layouts.partials._switch_lang')
    @include('admin.language._script')
    @include('admin.language._languages')
    @include('admin.language._countries')
    <script>
        $("#language").select2({
            theme: "bootstrap4",
            minimumResultsForSearch: 5,
            data: languages
        });

        $("#country").select2({
            theme: "bootstrap4",
            minimumResultsForSearch: 5,
            data: countries
        });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
