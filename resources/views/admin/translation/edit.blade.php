@extends('adminlte::page')

@section('title', __('localization.title_edit_translation'))

@section('content_header')
    <x-breadcrumbs title="{{ __('localization.title_edit_translation') }}" currentActive="{{ __('general.breadcrumb_edit') }}" :addLink="[route('translations.index') => __('localization.title_translations')]"/>
@stop

@section('content')
    <form action="{{ route('translations.update', [$translation->id]) }}" method="POST" role="form">
    @method('PUT')
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
                            <label for="string">{{ __('localization.label_key') }}</label>
                            <input type="text" name="key" class="form-control @error('key') is-invalid @enderror"
                                   id="string" placeholder="{{ __('localization.placeholder_key') }}" value="{{ old('key', $translation->key) }}" disabled>
                            @error('key')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="string">{{ __('localization.label_text') }}</label>
                            @foreach($text as $index => $value)
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">{{ strtoupper($index) }}</div>
                                <input type="text" name="text[{{ $index }}]" class="form-control" placeholder="{{ __('localization.placeholder_text') }}" value="{{ old('translation', $value) }}">
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
