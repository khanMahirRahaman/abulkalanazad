@extends('adminlte::master')

@section('classes_body', 'hold-transition lockscreen')

@section('body')
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <img src="{{ asset(config('adminlte.logo_img_auth')) }}" height="50">
        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
    </div>
    <!-- User name -->
    <div class="lockscreen-name">{{ Auth::user()->name }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ Users::getAvatar(Auth::user()->photo) }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials">
            <div class="input-group">
                <input type="password" class="form-control" placeholder="password">

                <div class="input-group-append">
                    <button type="button" class="btn">
                        <i class="fas fa-arrow-right text-muted"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="login.html">Or sign in as a different user</a>
    </div>
</div>
<!-- /.center -->
@stop
