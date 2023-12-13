@extends('adminlte::page')

@section('title', __('menu.title_menu_items'))

@section('content_header')
    <x-breadcrumbs title="{{ __('menu.title_menu') }}" currentActive="{{ __('menu.title_menu_items') }}"
                   :addLink="[route('menus.index') => 'Menu']"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('admin.menu._select-menu')
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            @include('admin.menu._createitem')
        </div>
        <div class="col-md-8">
            @include('admin.menu._menu-structure')
        </div>
    </div>
@stop

@section('plugins.Pace', true)
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Toastr', true)

@push('css')
    @include('admin.menu._style')
@endpush

@push('js')
    <script src="{{ asset('vendor/nestable/jquery.nestable.js') }}"></script>
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('admin.menu._script')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
