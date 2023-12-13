@extends('adminlte::page')

@section('title', __('page.title_edit_page'))

@section('content_header')
    <x-breadcrumbs title="{{ __('page.title_edit_page') }}" currentActive="{{ __('general.breadcrumb_edit') }}" :addLink="[route('pages.index') => __('page.title_pages')]"/>
@stop

@section('content')
<form action="{{route('pages.update', [$page->id])}}" method="POST" role="form" enctype="multipart/form-data">
@method('PUT')
@csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">
                    <div class="form-group">
                        <label for="titlePost">{{ __('page.label_title') }}</label>
                        <input id="titlePost" type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            placeholder="{{ __('page.placeholder_title') }}" value="{{ $page->post_title }}" required autofocus>
                        @if ($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <p>
                            <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseSlug" role="button" aria-expanded="false" aria-controls="collapseSlug">
                                {{ __('page.button_custom_permalink') }}
                            </a>
                        </p>
                        <div class="collapse{{ $errors->has('slug') ? ' show' : '' }}" id="collapseSlug">
                            <input type="text" name="slug"
                                   class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" id="slugPost"
                                   placeholder="{{ __('page.placeholder_custom_permalink') }}" value="{{ old('slug') ? old('slug') : $page->post_name }}">
                            @if ($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('page.label_summary') }}</label>
                        <textarea name="summary" class="form-control" rows="3"
                            placeholder="{{ __('page.placeholder_summary') }}">{{ $page->post_summary }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('page.label_content') }}</label>
                        <textarea name="content" placeholder="{{ __('page.placeholder_content') }}"
                            style="width: 100%; height: 200px; font-weight:normal">{{ $page->post_content }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('post.label_language') }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">
                                <img src="{{ asset('img/flags/4x3/'.strtolower($language->country_code).'.svg') }}" width="25">
                            </span>
                            </div>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" value="{{ $language->language }}" disabled>
                            <input type="hidden" name="language" value="{{ $language->id }}">
                            <input id="language" type="hidden" value="{{ Languages::showCodeLanguage($page->post_language) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('post.label_translations') }}</label>
                        @foreach(Languages::showWithFlag() as $trans)
                            @if($trans->language_code != $language->language_code)
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="{{ asset('img/flags/4x3/'.strtolower($trans->country_code).'.svg') }}" width="25">
                                    </span>
                                        @if(Posts::checkExistsTrans($trans->language_code, $page->translations->first()->value))
                                            <a class="btn btn-outline-secondary" href="{{ route('pages.edit', Posts::getTransPostId($trans->id, $page->translations->first()->value)) }}">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-outline-secondary" href="{{ route('pages.create.translate', ['id' => $page->id, 'lang' => $trans->language_code]) }}">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <input type="text" class="form-control" aria-describedby="basic-addon1" value="{{ Posts::showTransPostTitle($trans->id, $page->translations->first()->value) }}" disabled>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('page.label_featured_image') }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="upload-photo @if($ready)ready @endif">
                            <input id="upload" type="file" name="image" value="{{ __('general.choose_a_file') }}" accept="image/*" data-role="none" hidden>
                            <div class="col-md-12">
                                <div class="upload-msg">{{ __('page.placeholder_featured_image') }}</div>
                                <div id="display">
                                    <img id="image_preview_container" src="{{ $image }}" alt="{{ __('general.preview_image') }}"  style="width: 100%;">
                                    <input type="hidden" name="isimage">
                                </div>
                                <div class="buttons text-center mt-3">
                                    <button id="reset" type="button" class="reset btn btn-danger">{{ __('general.remove_image') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('page.card_title_publish') }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="meta_description">{{ __('page.label_meta_description') }}</label>
                        <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="{{ __('page.placeholder_meta_description') }}">{{ $page->meta_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">{{ __('page.label_meta_keyword') }}</label>
                        <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="3" placeholder="{{ __('page.placeholder_meta_keyword') }}">{{ $page->meta_keyword}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>{{ __('post.label_visibility') }}</label>
                        <select id="visibility" class="form-control" name="visibility">
                            @if($visibility == 'public')
                                <option id="public" value="public" selected>{{ __('post.option_public') }}</option>
                                <option id="private" value="private">{{ __('post.option_private') }}</option>
                            @else
                                <option id="public" value="public">{{ __('post.option_public') }}</option>
                                <option id="private" value="private" selected>{{ __('post.option_private') }}</option>
                            @endif
                        </select>
                        <small class="form-text text-muted visibility-msg">
                            {{ __('post.help_public_visibility') }}
                        </small>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="publish" value="{{ __('page.button_submit') }}">
                        <input class="btn btn-secondary" type="submit" name="draft" value="{{ __('page.button_save_draft') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/summernote-add-text-tags/summernote-add-text-tags.css') }}">
@include('admin.page._style')
@endpush

@push('js')
<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('vendor/summernote-image-attributes-editor/summernote-image-attributes.js') }}"></script>
<script src="{{ asset('vendor/summernote-image-attributes-editor/lang/en-us.js') }}"></script>
<script src="{{ asset('vendor/summernote-add-text-tags/summernote-add-text-tags.js') }}"></script>
<script src="{{ asset('vendor/summernote-ext-highlight/summernote-ext-highlight.js') }}"></script>
<script src="{{ asset('vendor/summernote-video-attributes/summernote-video-attributes.js') }}"></script>
@include('layouts.partials._notification')
@include('layouts.partials._switch_lang')
@include('layouts.partials._csrf-token')
@include('admin.page._script')
<script>
    "use strict";

    $('.upload-msg').on("click", function() {
        $("#upload").trigger("click");
    })

    const element = document.querySelector(".upload-photo");
    $('input[name=isimage]').val(element.classList.contains("ready"));

    $('#reset').on("click", function() {
        $('#display').removeAttr('hidden');
        $('#reset').attr('hidden');
        $('.upload-photo').removeClass('ready result');
        $('#image_preview_container').attr('src', 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D');
        $('input[name=isimage]').val("false");
    })

    function readFile(input) {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('.upload-photo').addClass('ready');
            $('#image_preview_container').attr('src', e.target.result);
            $('input[name=isimage]').val("true");
        }
        reader.readAsDataURL(input.files[0]);
    }

    $('#upload').on('change', function() {
        readFile(this);
    })
</script>
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
