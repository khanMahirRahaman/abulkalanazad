@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_email_url = View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_email_url = $password_email_url ? route($password_email_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_email_url = $password_email_url ? url($password_email_url) : '' )
@endif

@section('title', __('adminlte.email') .' - '. strip_tags(config('adminlte.logo')))

@section('auth_box_msg', __('adminlte.password_reset_message'))

@section('auth_body')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ $password_email_url }}" method="post">
        {{ csrf_field() }}

        {{--Email field--}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte.email') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{--Send reset link button--}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('adminlte.button_submit_forget_password') }}
        </button>

    </form>

@stop

@section('auth_link_footer')
    @if($login_url)
        <p class="mb-1 mt-3">
            <a href="{{ $login_url }}">
                {{ __('adminlte.login') }}
            </a>
        </p>
    @endif
@stop
