@extends('adminlte::page')

@section('title', __('user.title_edit_user'))

@section('content_header')
    <x-breadcrumbs title="{{ __('user.title_edit_user') }}" currentActive="{{ __('general.breadcrumb_edit') }}"
                   :addLink="[route('users.index') => __('user.title_users')]"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <form action="{{route('users.update',[$user->id])}}" method="POST" role="form"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="userName">{{ __('user.label_name') }}</label>
                            <input id="userName" type="text" name="name"
                                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   value="{{ $user->name }}" required autofocus>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="username">{{ __('user.label_username') }}</label>
                            <input id="username" type="text" name="username"
                                   class="form-control @error('username') is-invalid @enderror" placeholder="{{ __('user.placeholder_username') }}" value="{{ $user->username }}" required>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('user.label_email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('user.label_change_password') }}</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('user.placeholder_change_password') }}" autocomplete="new-password">
                                <div class="input-group-append password">
                                    <div class="input-group-text">
                                        <span class="fas fa-eye"></span>
                                    </div>
                                </div>
                            </div>
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
                                       placeholder="{{ __('user.placeholder_confirm_password') }}" autocomplete="new-password">
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
                            <input type="text" id="occupation" name="occupation"
                                   class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                                   placeholder="{{ __('user.placeholder_occupation') }}" value="{{ $user->occupation }}">
                        </div>
                        <div class="form-group">
                            <label for="occupation">{{ __('user.label_about') }}</label>
                            <textarea name="about" id="about" class="form-control" rows="3"
                                      placeholder="{{ __('user.placeholder_about') }}">{{ $user->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="socialmedia">{{ __('user.label_socialmedia') }}</label>
                            <select id="socialmedia" name="socialmedia" class="select2"
                                    data-placeholder="{{ __('user.placeholder_socialmedia') }}" style="width: 100%;"></select>
                        </div>
                        <div class="row socmed">
                            @if($checkRelSocmed)
                                @foreach($userRel as $getSocMed)
                                    <div class="col-lg-6" id="socmed{{ $getSocMed->id }}">
                                        <div class="form-group"><label> {{ __('user.label_url') }} {{ $getSocMed->name }} </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"> <i class="{{ $getSocMed->icon }}"></i></span></div>
                                                <input type="text" name="{{ $getSocMed->slug }}" class="form-control" placeholder="{{ $getSocMed->url }}" value="{{ $getSocMed->pivot->url }}">
                                                <div class="input-group-append" onclick="removeInput({{ $getSocMed->id }})"><span class="input-group-text"><i class="fas fa-times"></i></span></div>
                                            </div>
                                        </div><input type="hidden" name="socmed[]" value="{{ $getSocMed->id }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ __('user.label_photo') }}</label>
                            <div class="upload-photo @if($user->photo) ready result @endif">
                                <input type="file" id="upload" name="image" value="Choose a file" accept="image/*" data-role="none" hidden>
                                <input type="hidden" name="image_base64">
                                <input type="hidden" name="isupload">
                                <div class="col-md-12">
                                    <div class="upload-msg">{{ __('user.placeholder_photo') }}</div>
                                    <div id="display" @if($user->photo) hidden @endif></div>
                                    <div id="display-i" class="mx-auto">
                                        <img src="{{ $image }}" alt="" style="width:200px">
                                    </div>
                                    <div class="buttons text-center">
                                        <button id="btn-upload-result" type="button" class="upload-result btn btn-info"
                                                hidden>{{ __('user.button_use_this_image') }}</button>
                                        <button id="btn-upload-reset" type="button" class="reset btn btn-warning"
                                                hidden>{{ __('user.button_reset') }}</button>
                                        <button id="btn-remove" type="button" class="reset btn btn-danger"
                                                @empty($user->photo) hidden @endempty>{{ __('user.button_remove_image') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userName">{{ __('user.label_role') }}</label>
                            <select id="role" name="role" class="select2" data-placeholder="Select Role" style="width: 100%;" required>
                                @foreach( $user->roles as $role )
                                    <option value="{{ $role->id }}" selected="selected">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(Auth::id() != $user->id)
                        <div class="form-group">
                            <label for="status">{{ __('user.label_status') }}</label>
                            <div>
                                @if ($user->isBanned())
                                    <input type="checkbox" name="status" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="{{__('user.opt_deactivated')}}" data-on-text="{{__('user.opt_activated')}}">
                                @else
                                    <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="{{__('user.opt_deactivated')}}" data-on-text="{{__('user.opt_activated')}}">
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">{{ __('user.button_update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/croppie/croppie.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
    @include('admin.user._style')
@endpush

@push('js')
    <script src="{{ asset('vendor/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('vendor/croppie/croppie.min.js') }}"></script>
    <script src="{{ asset('js/show-hide-password.js') }}"></script>
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('admin.user._script')
    <script>
        "use strict";

        $('.upload-msg').on("click", function() {
            $('#btn-remove').attr('hidden', 'hidden');
            $('#btn-upload-result').removeAttr('hidden');
            $('#btn-upload-reset').removeAttr('hidden');
            $('#upload').trigger("click");
        });

        $('#btn-upload-reset, #btn-remove').on("click", function() {
            $('#btn-remove').attr('hidden', 'hidden');
            $('#display').removeAttr('hidden');
            $('#btn-upload-result').removeAttr('hidden');
            $('#btn-upload-reset').removeAttr('hidden');
            $('.upload-photo').removeClass('ready result');
            $("#display-i").html('');
            $('#upload').val('');
            $('input[name=isupload]').val("remove");
        });

        let $uploadCrop;

        function readFile(input) {
            if (input.files && input.files[0]) {
                if (/^image/.test(input.files[0].type)) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        $('.upload-photo').addClass('ready');
                        $('input[name=isupload]').val("true");
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function() {
                            // console.log('jQuery bind complete');
                        });
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    alert("__('You may only select image files')");
                }
            } else {
                alert("__('Sorry - you're browser doesn't support the FileReader API')");
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

        $('#upload').on('change', function() {
            readFile(this);
        });

        $('#btn-upload-result').on('click', function(ev) {
            let fileInput = document.getElementById('upload');
            let fileName = fileInput.files[0].name;
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                $('#btn-upload-result').attr('hidden', 'hidden');
                $('#display').attr('hidden', 'hidden');
                $('.upload-photo').addClass('result');
                $('input[name=image_base64]').val(resp);
                popupResult({
                    src: resp
                });
            });
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
