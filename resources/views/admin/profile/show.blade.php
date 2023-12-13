@extends('adminlte::page')

@section('title', __('user.title_profile'))

@section('content_header')
    <x-breadcrumbs title="{{ __('user.title_profile') }}" currentActive="{{ __('user.title_profile') }}"/>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if(Auth::user()->photo)
                                @if(Auth::user()->photo)
                                    <img class="profile-user-img img-fluid img-circle"
                                    src="{{ route('profile.photo', Auth::user()->photo) }}" alt="User profile picture">
                                @else
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/noavatar.png') }}"
                                    alt="User profile picture">
                                @endif
                            @else
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/noavatar.png') }}"
                                    alt="User profile picture">
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                        <p class="text-muted text-center">{{ $role }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('user.profile_aboutme') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-user-md mr-1"></i>{{ __('user.profile_occupation') }}</strong>
                        <p class="text-muted">
                            {{ $user->occupation }}
                        </p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i>{{ __('user.profile_about') }}</strong>
                        <p class="text-muted">{{  $user->about }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <form class="form-horizontal" action="{{ route('profile.update',[$user->id]) }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings"
                                        data-toggle="tab">{{ __('user.tab_profile_settings') }}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#photo" data-toggle="tab">{{ __('user.tab_profile_photo') }}</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">{{ __('user.label_name') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="inputName"
                                                placeholder="Name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">{{ __('user.label_username') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" id="inputUsername"
                                                placeholder="Username" value="{{ $user->username }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">{{ __('user.label_email') }}</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="inputEmail"
                                                placeholder="Email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputOccupation" class="col-sm-2 col-form-label">{{ __('user.label_occupation') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="occupation" class="form-control"
                                                id="inputOccupation" placeholder="Occupation"
                                                value="{{ $user->occupation }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAbout" class="col-sm-2 col-form-label">{{ __('user.label_about') }}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="about" id="inputAbout"
                                                placeholder="About">{{ $user->about }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="socialmedia"
                                            class="col-sm-2 col-form-label">{{ __('user.label_socialmedia') }}</label>
                                        <div class="col-sm-10">
                                            <select id="socialmedia" name="socialmedia" class="select2 form-control"
                                                data-placeholder="{{ __('user.placeholder_socialmedia') }}" style="width: 100%;"></select>
                                        </div>
                                    </div>
                                    <div class="socmed">
                                        @if($checkRelSocmed)
                                        @foreach($userRel as $getSocMed)
                                        <div class="form-group row" id="socmed{{ $getSocMed->id }}">
                                            <label for="" class="col-sm-2 col-form-label">{{ $getSocMed->name }}</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text"> <i
                                                                class="{{ $getSocMed->icon }}"></i></span></div>
                                                    <input type="text" name="{{ $getSocMed->slug }}"
                                                        class="form-control" placeholder="{{ $getSocMed->url }}"
                                                        value="{{ $getSocMed->pivot->url }}">
                                                    <div class="input-group-append"
                                                        onclick="removeInput({{ $getSocMed->id }})"><span
                                                            class="input-group-text"><i class="fas fa-times"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><input type="hidden" name="socmed[]" value="{{ $getSocMed->id }}">
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputRole" class="col-sm-2 col-form-label">{{ __('user.label_role') }}</label>
                                        <div class="col-sm-10">
                                            <select id="role" name="roles[]" class="select2" multiple="multiple"
                                                data-placeholder="{{ __('user.select_role') }}" style="width: 100%;" disabled>
                                                @foreach( $roles as $role )
                                                <option value="{{ $role->id }}" selected="selected">{{ $role->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="photo">
                                    <div class="form-group">
                                        <div class="upload-photo @if($image) ready result @endif">
                                            <input type="file" id="upload" name="image" value="Choose a file {{ __('user.choose_a_file') }}"
                                                accept="image/*" data-role="none" hidden>
                                            <input type="hidden" name="image_base64">
                                            <input type="hidden" name="isupload">
                                            <div class="col-md-12">
                                                <div class="upload-msg">{{ __('user.placeholder_photo') }}</div>
                                                <div id="display" @if($image) hidden @endif></div>
                                                <div id="display-i" class="mx-auto">
                                                    <img src="{{ $image }}" alt="" style="width:200px">
                                                </div>
                                                <div class="buttons text-center">
                                                    <button id="btn-upload-result" type="button"
                                                        class="upload-result btn btn-info" hidden>{{ __('user.button_use_this_image') }}</button>
                                                    <button id="btn-upload-reset" type="button"
                                                        class="reset btn btn-warning" hidden>{{ __('user.button_reset') }}</button>
                                                    <button id="btn-remove" type="button" class="reset btn btn-danger"
                                                        @empty($image) hidden @endempty>{{ __('user.button_remove_image') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit"
                                class="btn btn-primary float-right">{{ __('user.button_profile_update') }}</button>
                        </div>
                    </div>
                </form>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/croppie/croppie.css') }}">
@include('admin.profile._style')
@endpush

@push('js')
<script src="{{ asset('vendor/croppie/croppie.min.js') }}"></script>
@include('layouts.partials._switch_lang')
@include('layouts.partials._notification')
@include('admin.profile._script')
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
