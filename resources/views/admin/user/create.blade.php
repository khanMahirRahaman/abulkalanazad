@extends('adminlte::page')

@section('title', __('user.title_addnew_user'))

@section('content_header')
    <x-breadcrumbs title="{{ __('user.title_addnew_user') }}" currentActive="{{ __('general.breadcrumb_add_new') }}"
                   :addLink="[route('users.index') => __('user.title_users')]"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <form id="user" action="{{ route('users.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('user.label_name') }}</label>
                            <input id="name" type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('user.placeholder_name') }}" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">{{ __('user.label_username') }}</label>
                            <input id="username" type="text" name="username"
                                   class="form-control @error('username') is-invalid @enderror" placeholder="{{ __('user.placeholder_username') }}" value="{{ old('username') }}" required>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('user.label_email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" placeholder="{{ __('user.placeholder_email') }}" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('user.label_password') }}</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('user.placeholder_password') }}" required autocomplete="new-password">
                                <div class="input-group-append password">
                                    <div class="input-group-text">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
                            <small id="passwordlHelp" class="form-text text-muted">{{ __('user.help_password') }}</small>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('user.label_confirm_password') }}</label>
                            <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                       placeholder="{{ __('user.placeholder_confirm_password') }}" required autocomplete="new-password">
                                <div class="input-group-append password_confirmation">
                                    <div class="input-group-text">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="occupation">{{ __('user.label_occupation') }}</label>
                            <input id="occupation" type="text" name="occupation" class="form-control @error('occupation') is-invalid @enderror" placeholder="{{ __('user.placeholder_occupation') }}" value="{{ old('occupation') }}">
                        </div>
                        @error('occupation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="about">{{ __('user.label_about') }}</label>
                            <textarea id="about" name="about" class="form-control @error('about') is-invalid @enderror"
                                      rows="3" placeholder="{{ __('user.placeholder_about') }}">{{ old('about') }}</textarea>
                        </div>
                        @error('about')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label for="socialmedia">{{ __('user.label_socialmedia') }}</label>
                            <select id="socialmedia" name="socialmedia" class="select2"
                                    data-placeholder="{{ __('user.placeholder_socialmedia') }}" style="width: 100%;"></select>
                        </div>
                        <div class="row socmed"></div>
                        <div class="form-group">
                            <label for="upload">{{ __('user.label_photo') }}</label>
                            <div class="upload-photo">
                                <input id="upload" type="file" name="image" value="Choose a file" accept="image/*" data-role="none" hidden>
                                <input id="image_base64" type="hidden" name="image_base64">
                                <div class="col-md-12">
                                    <div class="upload-msg">{{ __('user.placeholder_photo') }}</div>
                                    <div id="display"></div>
                                    <div id="display-i" class="mx-auto"></div>
                                    <div class="buttons text-center">
                                        <button id="btn-upload-result" type="button" class="upload-result btn btn-info">{{ __('user.button_use_this_image') }}</button>
                                        <button id="btn-upload-reset" type="button" class="reset btn btn-danger">{{ __('user.button_remove_image') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role">{{ __('user.label_role') }}</label>
                            <select id="role" name="role" class="select2 @error('roles')is-invalid @enderror" data-placeholder="{{ __('user.placeholder_role') }}" style="width: 100%;" required></select>
                            @error('roles')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">{{ __('user.button_submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/croppie/croppie.css') }}">
    @include('admin.user._style')
@endpush

@push('js')
    <script src="{{ asset('vendor/croppie/croppie.min.js') }}"></script>
    <script src="{{ asset('js/show-hide-password.js') }}"></script>
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('admin.user._script')
    <script>
        "use strict";

        $(".upload-msg").on("click", function () {
            $("#upload").trigger("click");
        })

        $("#btn-upload-reset").on("click", function () {
            $('#display').removeAttr('hidden');
            $('#btn-upload-result').attr('hidden');
            $('.upload-photo').removeClass('ready result');
            $("#display-i").html("");
            $('#upload').val("");
            $uploadCrop.croppie("bind", {
                url: ""
            }).then(function () {
            });
        });

        let $uploadCrop;

        function readFile(input) {
            if (input.files && input.files[0]) {
                if (/^image/.test(input.files[0].type)) { // only image file
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('.upload-photo').addClass('ready');
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function () {
                            // console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    alert("You may only select image files");
                }
            } else {
                alert("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        $uploadCrop = $('#display').croppie({
            viewport: {
                width: 200,
                height: 200,
                type: 'square'
            },
            boundary: {
                width: 300,
                height: 300
            },
        });

        function popupResult(result) {
            let html = '<img src="' + result.src + '" />';
            $("#display-i").html(html);
        }

        $('#upload').on('change', function () {
            readFile(this);
        });

        $('#btn-upload-result').on('click', function (ev) {
            let fileInput = document.getElementById('upload');
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {
                $('input[name=image_base64]').val(resp);
                $('#btn-upload-result').attr('hidden', 'hidden');
                $('#display').attr('hidden', 'hidden');
                $('.upload-photo').addClass('result');
                popupResult({
                    src: resp
                });
            });
        });
    </script>
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
