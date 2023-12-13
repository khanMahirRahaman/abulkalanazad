@extends('adminlte::page')

@section('title', __('localization.title_edit_language'))

@section('content_header')
    <x-breadcrumbs title="{{ __('localization.title_edit_language') }}" currentActive="{{ __('general.breadcrumb_edit') }}" :addLink="[route('languages.index') => __('localization.title_languages')]"/>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <form action="{{ route('languages.update', [$language]) }}" method="POST" role="form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="language">{{ __('localization.label_language') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">{{ strtoupper($language->language_code) }}</div>
                                <input type="text" name="language" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="{{ __('localization.placeholder_language') }}" required value="{{ $language->language }}">
                            </div>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="country">{{ __('localization.label_country') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="{{ asset('img/flags/4x3/'.strtolower($language->country_code).'.svg') }}" width="25">
                            </span>
                                </div>
                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="{{ $language->country }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">{{ __('localization.button_language_update') }}</button>
                        <a href="{{ route('languages.index') }}" class="btn btn-warning">{{ __('localization.button_back') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@stop

@section('adminlte_js')
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('admin.language._countries')
@stop

@section('footer')
    @include('layouts.partials._footer')
@stop
