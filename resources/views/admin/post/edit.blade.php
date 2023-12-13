@extends('adminlte::page')

@section('title', __('post.title_edit_post'))

@section('content_header')
    <x-breadcrumbs title="{{ __('post.title_edit_post') }}" currentActive="{{ __('general.breadcrumb_edit') }}"
                   :addLink="[route('posts.index') => __('post.title_posts')]" />
@stop

@section('content')
    <form action="{{ route('posts.update', [$post->id]) }}" method="POST" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="postDate">Date</label>
                            <input type="date" name="postDate"
                                   class="form-control {{ $errors->has('postDate') ? 'is-invalid' : '' }}" id="postDate"
                                   value="{{ $post->created_at?date('Y-m-d',strtotime($post->created_at)):date('Y-m-d') }}"
                                   required autofocus>
                            @if ($errors->has('postDate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('postDate') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="titlePost">{{ __('post.label_title') }}</label>
                            <input type="text" name="title"
                                   class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="titlePost"
                                   placeholder="{{ __('post.placeholder_title') }}"
                                   value="{{ old('title') ? old('title') : $post->post_title }}" onchange="convertToSlug()" required
                                   autofocus>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            {{--                            <p>--}}
                            {{--                                <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseSlug" role="button"--}}
                            {{--                                    aria-expanded="false" aria-controls="collapseSlug">--}}
                            {{--                                    {{ __('post.button_custom_permalink') }}--}}
                            {{--                                </a>--}}
                            {{--                            </p>--}}
                            <input type="text" name="slug"
                                   class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" id="slugLine"
                                   placeholder="{{ __('post.placeholder_custom_permalink') }}" value="{{ old('post_name') ? old('post_name') : $post->post_name }}">
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="summaryPost">{{ __('post.label_summary') }}</label>
                            <textarea name="summary" class="form-control" rows="3"
                                      placeholder="{{ __('post.placeholder_summary') }}">{{ $post->post_summary }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="portal_name">Newspaper Name</label>
                            <input type="text" name="portal_name"
                                   class="form-control {{ $errors->has('portal_name') ? 'is-invalid' : '' }}" id="portal_name"
                                   value="{{ $post->portal_name?:''}}"
                                    autofocus>
                            @if ($errors->has('portal_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('portal_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="contentPost">{{ __('post.label_content') }}</label>
                            <textarea id="contentPost" name="content" placeholder="{{ __('post.placeholder_content') }}"
                                      style="width: 100%; height: 200px; font-weight:normal">{{ $post->post_content }}</textarea>
                        </div>
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="dataList" style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\PostGallery::where("post_id","=",$post->id)->get() as $post_images)
                                <tr>
                                    <td><img src="{{asset('/uploads/postimage/'.$post_images->image)}}" width="50" alt="gallery image"></td>
                                    <td><input type="checkbox" name="deleteimages[]" value="{{$post_images->id}}"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                        <div class="form-group">
                            <label for="">Add more Images</label>
                            <input class="form-control-file" type="file" name="gallery[]" multiple>
                        </div>
                        <div class="form-group">
                            <label for="">Video</label>
                            @php $video = \App\Models\Video::select("url")->where("post_id","=",$post->id)->first() @endphp
                            <input class="form-control" type="text" name="video" placeholder="Youtube video id" value="{{$video?$video->url:''}}">
                        </div>
                        <div class="form-group">
                            <label for="">File (PDF Only)</label>
                            @if($post->post_summary!==null)
                           <a href="{{asset('uploads/pdfs').'/'.$post->pdffile}}" target="_blank">View</a>
                            @endif
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
                            <label for="language">{{ __('post.label_language') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img src="{{ asset('img/flags/4x3/' . strtolower($language->country_code) . '.svg') }}"
                                             width="25">
                                    </span>
                                </div>
                                <input type="text" class="form-control" aria-describedby="basic-addon1"
                                       value="{{ $language->language }}" disabled>
                                <input type="hidden" name="language" value="{{ $language->id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('post.label_translations') }}</label>
                            @foreach (Languages::showWithFlag() as $trans)
                                @if ($trans->language_code != $language->language_code)
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <img src="{{ asset('img/flags/4x3/' . strtolower($trans->country_code) . '.svg') }}"
                                                     width="25">
                                            </span>
                                            @if (Posts::checkExistsTrans($trans->language_code, $post->translations->first()->value))
                                                <a class="btn btn-outline-secondary"
                                                   href="{{ route('posts.edit', Posts::getTransPostId($trans->id, $post->translations->first()->value)) }}">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            @else
                                                <a class="btn btn-outline-secondary"
                                                   href="{{ route('posts.create.translate', ['id' => $post->id, 'lang' => $trans->language_code]) }}">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <input type="text" class="form-control" aria-describedby="basic-addon1"
                                               value="{{ Posts::showTransPostTitle($trans->id, $post->translations->first()->value) }}"
                                               disabled>
                                    </div>
                                @endif
                            @endforeach
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
                                @foreach ($post->terms()->category()->get() as $category)
                                    <option value="{{ $category->id }}" selected="selected">{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">
                                {{ __('post.help_categories') }}
                            </small>
                        </div>
                        <div class="form-group">
                            <p>
                                <a class="" href="#collapseCategory" data-toggle="collapse" id="add_category"
                                   role="button" aria-expanded="false" aria-controls="collapseCategory">
                                    {{ __('post.label_add_categories') }}
                                </a>
                            </p>
                        </div>
                        <div class="collapse @error('add_new_category')) show @enderror" id="collapseCategory">
                            <div class="form-group">
                                <input id="input-add-category" type="text" name="add_new_category"
                                       class="form-control @error('title') is-invalid @enderror" autofocus>
                                <div class="invalid-feedback msg-error-name-category"></div>
                            </div>
                            <div class="form-group">
                                <select id="parent" name="parent" class="select2"
                                        data-placeholder="{{ __('term.placeholder_parent') }}" style="width: 100%;"></select>
                            </div>
                            <button id="btn-submit-add-category" type="button"
                                    class="btn btn-info btn-sm float-right">{{ __('Add New Category') }}</button>
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
                            <input type="text" class="form-control" data-role="tagsinput" name="tags"
                                   placeholder="{{ __('post.placeholder_tags') }}" value="{{ $tags }}">
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
                            <div class="upload-photo @if (!empty($post->post_image)) ready @endif">
                                <input id="upload" type="file" name="image"
                                       value="{{ __('general.choose_a_file') }}" accept="image/*" data-role="none" hidden>
                                <input type="hidden" name="isimage">
                                <div class="col-md-12">
                                    <div class="upload-msg">{{ __('general.placeholder_image_upload') }}</div>
                                    <div id="display">
                                        <img id="image_preview_container" src="{{ $image }}"
                                             alt="{{ __('general.preview_image') }}" style="width: 100%;">
                                    </div>
                                    <div class="buttons text-center mt-3">
                                        <button id="reset" type="button"
                                                class="reset btn btn-danger">{{ __('general.remove_image') }}</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="alt_image">Image Copyright info</label>
                                        <input id="alt_image" name="alt_image" class="form-control"
                                               placeholder="Copyright info" value="{{ $post->alt_image }}" >
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
                                      placeholder="{{ __('post.placeholder_meta_description') }}">{{ $post->meta_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keyword">{{ __('post.label_meta_keyword') }}</label>
                            <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="3"
                                      placeholder="{{ __('post.placeholder_meta_keyword') }}">{{ $post->meta_keyword }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ __('post.label_visibility') }}</label>
                            <select id="visibility" class="form-control" name="visibility">
                                @if ($visibility == 'public')
                                    <option id="public" value="public" selected>{{ __('post.option_public') }}
                                    </option>
                                    <option id="private" value="private">{{ __('post.option_private') }}</option>
                                @else
                                    <option id="public" value="public">{{ __('post.option_public') }}</option>
                                    <option id="private" value="private" selected>{{ __('post.option_private') }}
                                    </option>
                                @endif
                            </select>
                            <small class="form-text text-muted visibility-msg">
                                {{ __('post.help_public_visibility') }}
                            </small>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="publish"
                                   value="{{ __('post.button_submit') }}">
                            <input class="btn btn-secondary" type="submit" name="draft"
                                   value="{{ __('post.button_save_draft') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4-tag-input/tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}">
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
    <script>
        let lang = $("#language").val();
    </script>
    @include('admin.post._script')
    <script>
        "use strict";

        // UPLOAD IMAGE
        const element = document.querySelector(".upload-photo");
        $('input[name=isimage]').val(element.classList.contains("ready"));

        $('.upload-msg').on("click", function() {
            $("#upload").trigger("click");
        });

        $('#reset').on("click", function() {
            $('#display').removeAttr('hidden');
            $('#reset').attr('hidden');
            $('.upload-photo').removeClass('ready result');
            $('#image_preview_container').attr('src',
                'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D');
            $('input[name=isimage]').val("false");
        });

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
