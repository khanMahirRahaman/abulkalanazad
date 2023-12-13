@extends('adminlte::page')

@section('title', 'Add New Video')

@section('content_header')
    <x-breadcrumbs title="Add New Video" currentActive="{{ __('general.breadcrumb_add_new') }}" />
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add New Video</h3>
                    <a href="{{ route('video.index') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-list mr-1"></i> View List</a>
                </div>
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="videoUrl">Video Url</label>
                            <input type="text" name="video_url"
                                class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" id="video_url"
                                placeholder="Enter video url" required autofocus>
                            @if ($errors->has('video_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('video_url') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Thumnail</label>
                            <input type="file" class="form-control-file" id="thumnail" name="thumnail">
                            @if ($errors->has('thumnail'))
                                <strong class="text-danger">{{ $errors->first('thumnail') }}</strong>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <div class="col-md-3">
                                <img id="image_preview" src="" style="width: 100px;height: 100px; display:none">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_preview').css('display', 'block');
                    $('#image_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#thumnail").change(function() {
            readURL(this);
        });
    </script>
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
