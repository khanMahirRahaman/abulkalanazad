@extends('adminlte::page')

@section('title', __('post.title_addnew_post'))

@section('content_header')
    <x-breadcrumbs title="{{ __('post.title_addnew_post') }}" currentActive="{{ __('general.breadcrumb_add_new') }}" :addLink="[route('posts.index') => __('post.title_posts')]"/>
@stop

@section('content')
    <form id="form" action="{{ route('posts.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="postDate">Date</label>
                            <input type="date" name="postDate" class="form-control @error('postDate') is-invalid @enderror"
                                   id="postDate" value="{{ old('postDate') }}" autofocus required>
                            @error('postDate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="titlePost">{{ __('post.label_title') }}</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   id="titlePost" placeholder="{{ __('post.placeholder_title') }}" value="{{ old('title') }}" onchange="convertToSlug()" autofocus>
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
{{--                            <p>--}}
{{--                                <a class="btn btn-info btn-sm" href="#collapseSlug" data-toggle="collapse" id="slug" role="button" aria-expanded="false" aria-controls="collapseSlug">--}}
{{--                                    {{ __('post.button_custom_permalink') }}--}}
{{--                                </a>--}}
{{--                            </p>--}}
{{--                            <div class="collapse @error('slug')) show @enderror" id="collapseSlug">--}}
                                <input type="text" name="slug"
                                       class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" id="slugLine"
                                       placeholder="{{ __('post.placeholder_custom_permalink') }}" value="{{ old('slug') }}">
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
{{--                            </div>--}}
                        </div>
                        <div class="form-group">
                            <label for="summary">{{ __('post.label_summary') }}</label>
                            <textarea name="summary" class="form-control" rows="3" placeholder="{{ __('post.placeholder_summary') }}"
                                      ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="portal_name">Newspaper Name</label>
                            <input type="text" name="portal_name" class="form-control @error('portal_name') is-invalid @enderror"
                                   id="portal_name" value="{{ old('portal_name') }}" autofocus>
                            @error('portal_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">{{ __('post.label_content') }}</label>
                            <textarea name="content" placeholder="{{ __('post.placeholder_content') }}" style="width: 100%; height: 200px; font-weight:normal"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Images</label>
                            <input class="form-control-file" type="file" name="gallery[]" multiple>
                        </div>
                        <div class="form-group">
                            <label for="">Video</label>
                            <input class="form-control" type="text" name="video" placeholder="Youtube video id">
                        </div>
                        <div class="form-group">
                            <label for="">File (PDF Only)</label>
                            <input class="form-control" type="file" name="pdffile">
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
                            <select id="language" name="language" class="select2" data-placeholder="{{ __('post.placeholder_language') }}" style="width: 100%;">
                                @foreach( Languages::pluck('language', 'id') as $id => $language )
                                    @if($id == Auth::user()->language)
                                        <option value="{{ $id }}" selected="selected">{{ $language }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $language }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" id="language_id" name="language_id" value="{{ Auth::user()->language }}">
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('post.label_categories') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select id="categories" name="categories[]" class="select2" multiple="multiple"
                                    data-placeholder="{{ __('post.placeholder_categories') }}" style="width: 100%;">
                            </select>
                            <small class="form-text text-muted">
                                {{ __('post.help_categories') }}
                            </small>
                        </div>
                        <div class="form-group">
                            <p>
                                <a class="" href="#collapseCategory" data-toggle="collapse" id="add_category" role="button" aria-expanded="false" aria-controls="collapseCategory">
                                    {{ __('post.label_add_categories') }}
                                </a>
                            </p>
                        </div>
                        <div class="collapse @error('add_new_category')) show @enderror" id="collapseCategory">
                            <div class="form-group">
                                <input id="input-add-category" type="text" name="add_new_category" class="form-control @error('title') is-invalid @enderror" autofocus>
                                <div class="invalid-feedback msg-error-name-category"></div>
                            </div>
                            <div class="form-group">
                                <select id="parent" name="parent" class="select2" data-placeholder="{{ __('term.placeholder_parent') }}" style="width: 100%;"></select>
                            </div>
                            <button id="btn-submit-add-category" type="button" class="btn btn-info btn-sm float-right">{{ __('Add New Category') }}</button>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('post.label_tags') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" data-role="tagsinput" name="tags" placeholder="{{ __('post.placeholder_tags') }}">
                            <small class="form-text text-muted">
                                {{ __('post.help_tags') }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('post.label_featured_image') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="upload-photo">
                                <input id="upload" type="file" name="image" value="{{ __('general.choose_a_file') }}" accept="image/*"
                                       data-role="none" hidden>
                                <div class="col-md-12">
                                    <div class="upload-msg">{{ __('general.placeholder_image_upload') }}</div>
                                    <div id="display">
                                        <img id="image_preview_container" src="#" alt="{{ __('general.preview_image') }}"
                                             style="width: 100%;">
                                    </div>
                                    <div class="buttons text-center mt-3">
                                        <button id="reset" type="button"
                                                class="reset btn btn-sm btn-danger">{{ __('general.remove_image') }}</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="image_alt">Image copyright info</label>
                                        <input id="image_alt" name="image_alt" class="form-control"
                                                  placeholder="Copyright info"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('post.card_title_publish') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="meta_description">{{ __('post.label_meta_description') }}</label>
                            <textarea id="meta_description" name="meta_description" class="form-control" rows="3"
                                      placeholder="{{ __('post.placeholder_meta_description') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">{{ __('post.label_meta_keyword') }}</label>
                            <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="3"
                                      placeholder="{{ __('post.placeholder_meta_keyword') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ __('post.label_visibility') }}</label>
                            <select id="visibility" class="form-control" name="visibility">
                                <option id="public" value="public" selected>{{ __('post.option_public') }}</option>
                                <option id="private" value="private">{{ __('post.option_private') }}</option>
                            </select>
                            <small class="form-text text-muted visibility-msg">
                                {{ __('post.help_public_visibility') }}
                            </small>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="publish" value="{{ __('post.button_submit') }}">
                            <input class="btn btn-secondary" type="submit" name="draft" value="{{ __('post.button_save_draft') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4-tag-input/tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/summernote-add-text-tags/summernote-add-text-tags.css') }}">
    @include('admin.post._style')
@endpush

@push('js')
    <script src="{{ asset('vendor/bootstrap-4-tag-input/tagsinput.js') }}"></script>
    <script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('vendor/summernote-image-attributes-editor/summernote-image-attributes.js') }}"></script>
    <script src="{{ asset('vendor/summernote-image-attributes-editor/lang/en-us.js') }}"></script>
    <script src="{{ asset('vendor/summernote-add-text-tags/summernote-add-text-tags.js') }}"></script>
    <script src="{{ asset('vendor/summernote-ext-highlight/summernote-ext-highlight.js') }}"></script>
    <script src="{{ asset('vendor/summernote-video-attributes/summernote-video-attributes.js') }}"></script>
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('layouts.partials._csrf-token')
    @include('admin.post._script')
    <script>
        "use strict";

        // UPLOAD IMAGE
        $(document).on('click', '.upload-msg', function() {
            $("#upload").trigger("click");
        });

        $('#reset').on("click", function() {
            $('#display').removeAttr('hidden');
            $('#reset').attr('hidden');
            $('.upload-photo').removeClass('ready result');
            $('#image_preview_container').attr('src', '#');
            $('#upload')[0].value = '';
        });

        function readFile(input) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('.upload-photo').addClass('ready');
                $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }

        $('#upload').on('change', function() {
            readFile(this);
        });
    </script>
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop

<script>
    function convertToSlug()
    {
         var postTitle = $("#titlePost").val()
         var slug = postTitle.replace($("#titlePost").val(), $("#titlePost").val().replace(/^-+|-+$/g, '')
            .replace(/\s/g, '-').replace(/\-\-+/g, '-'));
        console.log(slug);
       $("#slugLine").val(slug)
    }
</script>
