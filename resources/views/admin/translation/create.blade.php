@extends('adminlte::page')

@section('title', __('localization.title_addnew_translation'))

@section('content_header')
    <x-breadcrumbs title="{{ __('localization.title_addnew_translation') }}" currentActive="{{ __('general.add_new') }}" :addLink="[route('translations.index') => __('localization.title_translations')]"/>
@stop

@section('content')
    <form id="form" action="{{ route('translations.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="group">{{ __('localization.label_group') }}</label>
                            <select id="group" name="group" class="select2"
                                    data-placeholder="{{ __('localization.placeholder_group') }}.." style="width: 100%;">
                                <option value="{{ old('group') }}" selected="selected">{{ old('group') }}
                                </option>
                            </select>
                            @error('group')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="string">{{ __('localization.label_key') }}</label>
                            <input type="text" name="key" class="form-control @error('key') is-invalid @enderror"
                                   id="string" placeholder="{{ __('localization.placeholder_key') }}" value="{{ old('key') }}" autofocus>
                            @error('key')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="string">{{ __('localization.label_text') }}</label>
                            @foreach($languages as $language)
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">{{ strtoupper($language->language_code) }}</div>
                                <input type="text" name="text[{{ $language->language_code }}]" class="form-control" placeholder="{{ __('localization.placeholder_text') }}">
                            </div>
                            @error('translation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('translations.index') }}" class="btn btn-warning">{{ __('localization.button_back') }}</a>
                        <button type="submit" class="btn btn-primary float-right">{{ __('localization.button_submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('admin.translation._script')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
