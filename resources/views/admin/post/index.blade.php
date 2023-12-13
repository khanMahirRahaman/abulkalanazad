@extends('adminlte::page')

@section('title', __('post.title_posts'))

@section('content_header')
    <x-breadcrumbs title="{{ __('post.title_posts') }}" currentActive="{{ __('post.title_posts') }}"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.post._table')
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
    <script>


        var dateColumnIndex = 6;
        var specificDateInput = $('#postDate');
        var dataTable;

        specificDateInput.on('change', applyDateFilter);

        function applyDateFilter() {
            if ($.fn.DataTable.isDataTable('#post-table')) {
                dataTable = $('#post-table').DataTable();
                var specificDate = specificDateInput.val().replace(/-/g, "/"); // Assuming the format is already "yyyy/mm/dd"
                if (specificDate) {
                    dataTable.column(dateColumnIndex).search(specificDate, false, false).draw();
                }
            }
        }


    </script>
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
