@extends('adminlte::page')

@section('title', __('media.title_edit_gallery'))

@section('content_header')
<x-breadcrumbs title="{{ __('media.title_edit_gallery') }}" currentActive="{{ __('general.breadcrumb_edit') }}" :addLink="[route('galleries.index') => __('media.title_galleries')]" />
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-default">
            <form action="{{route('galleries.update', [$gallery->id])}}" method="POST" role="form">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">{{ __('media.label_gallery_title') }}</label>
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="{{ __('media.placeholder_title') }}" required autofocus value="{{ $gallery->post_title }}">
                        @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <img src="{{ Images::get_image(json_decode($gallery->post_image_meta)->file) }}" alt="" class="w-100">
                    </div>

                    <div class="form-group">
                        <label for="alt_text">{{ __('media.label_alternative_text') }}</label>
                        <input type="text" name="alt_text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="alt_text" placeholder="{{ __('media.placeholder_alternative_text') }}" value="{{ $meta->attr_image_alt }}">
                        @if ($errors->has('alt_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('alt_text') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="caption">{{ __('media.label_caption') }}</label>
                        <input type="text" name="caption" class="form-control {{ $errors->has('caption') ? 'is-invalid' : '' }}" id="caption" placeholder="{{ __('media.placeholder_caption') }}" value="{{ strip_tags($gallery->post_summary) }}">
                        @if ($errors->has('caption'))
                        <div class="invalid-feedback">
                            {{ $errors->first('caption') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('media.label_description') }}</label>
                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" rows="3" name="description" placeholder="{{ __('media.placeholder_description') }}">{{ strip_tags($gallery->post_content) }}</textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('media.button_gallery_update') }}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">{{ __('media.chd_file_information') }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{ __('media.uploaded_on') }}: <strong>{{ $gallery->created_at }}</strong>
                </div>
                <div class="form-group">
                    <label>{{ __('media.fileurl') }}</label>
                    <input type="text" class="form-control" value="{{ $gallery->post_guid }}" readonly>
                </div>
                <div class="form-group">
                    {{ __('media.filename') }}: <strong>{{ $meta->file }}</strong>
                </div>
                <div class="form-group">
                    {{ __('media.filetype') }}: <strong>{{ $meta->type }}</strong>
                </div>
                <div class="form-group">
                    {{ __('media.filesize') }}: <strong>{{ $meta->size }}</strong>
                </div>
                <div class="form-group">
                    {{ __('media.dimension') }}: <strong>{{ $meta->dimension }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
<script src="{{ asset('vendor/pace-progress/pace.min.js') }}"></script>
@include('layouts.partials._notification')
@include('layouts.partials._switch_lang')
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop