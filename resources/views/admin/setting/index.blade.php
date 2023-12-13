@extends('adminlte::page')

@section('title', __('setting.title_settings'))

@section('content_header')
    <x-breadcrumbs title="{{ __('setting.title_settings') }}" currentActive="{{ __('setting.title_settings') }}"/>
@stop

@inject('setting', 'App\Helpers\Settings')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="web-information-tab" data-toggle="pill" href="#web-information" role="tab" aria-controls="web-information" aria-selected="true">{{ __('setting.web_information_tab') }}</a>
                            <a class="nav-link" id="web-contact-tab" data-toggle="pill" href="#web-contact" role="tab" aria-controls="web-contact" aria-selected="false">{{ __('setting.web_contact_tab') }}</a>
                            <a class="nav-link" id="web-properties-tab" data-toggle="pill" href="#web-properties" role="tab" aria-controls="properties" aria-selected="false">{{ __('setting.web_properties_tab') }}</a>
                            <a class="nav-link" id="web-config-tab" data-toggle="pill" href="#web-config" role="tab" aria-controls="web-config" aria-selected="false">{{ __('setting.web_config_tab') }}</a>
                            <a class="nav-link" id="web-backup-tab" data-toggle="pill" href="#web-backup" role="tab" aria-controls="web-backup" aria-selected="false">{{ __('setting.web_backup_tab') }}</a>
                            <a class="nav-link" id="web-permalinks-tab" data-toggle="pill" href="#web-permalinks" role="tab" aria-controls="web-permalinks" aria-selected="false">{{ __('setting.web_permalinks_tab') }}</a>
                        </div><!-- /.nav -->
                    </div><!-- /.col-5 -->
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            @include('admin.setting._web-information')
                            @include('admin.setting._web-contact')
                            @include('admin.setting._web-properties')
                            @include('admin.setting._web-config')
                            @include('admin.setting._web-backup')
                            @include('admin.setting._web-permalinks')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/codemirror/lib/codemirror.css') }}">
<style>
    .upload-msg {
        text-align: center;
        padding-top: 125px;
        padding-left: 30px;
        padding-right: 30px;
        font-size: 22px;
        color: #aaa;
        width: 300px;
        height: 300px;
        margin: 10px auto;
        border: 1px solid #aaa;
    }

    .upload-photo.ready #display {
        display: block;
    }

    .upload-photo.ready .buttons #reset {
        display: inline;
    }

    .upload-photo #display,
    .upload-photo .buttons #reset,
    .upload-photo.ready .upload-msg {
        display: none;
    }

    .hide {
        display: none;
    }
</style>
@endpush

@push('js')
<script src="{{ asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('vendor/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/selection/active-line.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/edit/matchbrackets.js') }}"></script>
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('layouts.partials._csrf-token')
    @include('admin.language._languages')
    @include('admin.setting._script')
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
