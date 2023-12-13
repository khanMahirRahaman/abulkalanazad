@extends('adminlte::page')

@section('title', __('advertisement.title_addnew_adunit'))

@section('content_header')
    <x-breadcrumbs title="{{ __('advertisement.title_addnew_adunit') }}" currentActive="{{ __('general.breadcrumb_add_new') }}" :addLink="[route('advertisement.index') => __('advertisement.title_adunit')]"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <form id="advertisementForm" action="{{ route('advertisement.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('advertisement.label_name') }}</label>
                            <input id="name" type="text" name="name"  class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('advertisement.placeholder_name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">{{ __('advertisement.label_type') }}</label>
                            <div id="ads_type" class="form-group">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn bg-cyan active">
                                        <input type="radio" name="type" id="option1" autocomplete="off" value="image" checked><i class="fas fa-image"></i>
                                        {{ __('advertisement.option_image') }}
                                    </label>
                                    <label class="btn bg-cyan">
                                        <input type="radio" name="type" id="option2" autocomplete="off" value="google_adsense"><i class="fab fa-google"></i>  {{ __('advertisement.option_googleadsense') }}
                                    </label>
                                    <label class="btn bg-cyan">
                                        <input type="radio" name="type" id="option3" autocomplete="off" value="script"><i class="fas fa-code"></i>  {{ __('advertisement.option_script') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="image">
                            <div class="form-group">
                                <label for="upload">{{ __('advertisement.label_upload_image') }}</label>
                                <div class="upload-image row justify-content-md-center">
                                    <input id="upload" type="file" name="image" accept="image/*"
                                           data-role="none" hidden>
                                    <div class="col-12 col-md-8 text-center">
                                        <div class="upload-msg">{{ __('advertisement.placeholder_upload_image') }}</div>
                                        <div id="display">
                                            <img id="image_preview_container" src="#" alt="{{ __('advertisement.alt_preview_image') }}"
                                                 style="max-width: 100%;">
                                        </div>
                                        <div class="buttons text-center mt-3">
                                            <button id="reset" type="button" class="reset btn btn-danger">{{ __('advertisement.button_change_image') }}</button>
                                        </div>
                                    </div>
                                </div>
                                <p class="msg-image text-center text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('advertisement.label_adsize') }}</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="number" name="width" class="form-control" placeholder="{{ __('advertisement.placeholder_width') }}" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">px</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="number" name="height" class="form-control" placeholder="{{ __('advertisement.placeholder_height') }}" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">px</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="url">{{ __('advertisement.label_url') }}</label>
                                <input id="url" type="url" name="url" class="form-control @error('url') is-invalid @enderror" placeholder="{{ __('advertisement.placeholder_url') }}">
                                @error('url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div id="google_adsense" class="form-group" hidden>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="ad_client">{{ __('advertisement.label_adclient') }}</label>
                                    <input id="ad_client" type="text" name="ad_client" class="form-control @error('ad_client') is-invalid @enderror" placeholder="{{__('advertisement.placeholder_adclient')}}">
                                    @error('ad_client')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ad_slot">{{ __('advertisement.label_adslot') }}</label>
                                    <input id="ad_slot" type="text" name="ad_slot" class="form-control @error('ad_slot') is-invalid @enderror" placeholder="{{__('advertisement.placeholder_adslot')}}">
                                    @error('ad_slot')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ad_size">{{ __('advertisement.label_adsize') }}</label>
                                <select id="ad_size" class="form-control" name="ad_size">
                                    <option value="fixed" selected>{{ __('advertisement.option_ad_fixed') }}</option>
                                    <option value="responsive">{{ __('advertisement.option_ad_responsive') }}</option>
                                </select>
                            </div>
                            <div id="display_fixed" class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="number" name="ad_width" class="form-control" placeholder="{{ __('advertisement.placeholder_fixed_width') }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">px</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="number" name="ad_height" class="form-control" placeholder="{{ __('advertisement.placeholder_fixed_height') }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">px</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="display_responsive" class="row" style="display:none">
                                <div class="form-group col-md-6">
                                    <label for="ad_format">{{ __('advertisement.label_adformat') }}</label>
                                    <input id="ad_format" type="text" name="ad_format" class="form-control @error('ad_format') is-invalid @enderror" placeholder="{{__('advertisement.placeholder_adformat')}}">
                                    @error('ad_format')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="full_width_responsive">{{ __('advertisement.label_full_width_responsive') }}</label>
                                    <select id="full_width_responsive" class="form-control" name="full_width_responsive">
                                        <option id="true" value="true" selected>{{ __('advertisement.option_width_responsive_true') }}</option>
                                        <option id="false" value="false">{{ __('advertisement.option_width_responsive_false') }}</option>
                                    </select>
                                    @error('full_width_responsive')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="script" class="form-group" hidden>
                            <label for="ad_unit">{{ __('advertisement.label_ad_custom_code') }}</label>
                            <textarea id="custom" name="script_custom" class="form-control scripts" cols="30" rows="7">{{ __('advertisement.placeholder_ad_custom_code') }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">{{ __('advertisement.button_submit') }}</button>
                        <a href="{{ route('advertisement.index') }}" class="btn btn-warning">{{ __('advertisement.button_back') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/codemirror/lib/codemirror.css') }}">
    @include('admin.advertisement._style')
@endpush

@push('js')
    <script src="{{ asset('vendor/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('vendor/codemirror/addon/selection/active-line.js') }}"></script>
    @include('layouts.partials._switch_lang')
    @include('layouts.partials._notification')
    @include('admin.advertisement._script')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop


