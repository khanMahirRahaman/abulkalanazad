@extends('adminlte::page')

@section('title', __('role.title_addnew_role'))

@section('content_header')
    <x-breadcrumbs title="{{ __('role.title_addnew_role') }}" currentActive="{{ __('general.breadcrumb_add_new') }}" :addLink="[route('roles.index') => __('role.title_roles')]"/>
@stop

@section('content')

<form action="{{ route('roles.store') }}" method="POST" role="form">
@csrf
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('role.label_name') }}</label>
                    <input type="text" name="name"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                        placeholder="{{ __('role.placeholder_name') }}" required autofocus>
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @can('add-permissions')
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('role.card_title_role_permission') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row" id="checkAllBox">
                        <div class="col-md-12 text-center mb-3">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input checkbox" type="checkbox" id="checkAll">
                                <label for="checkAll" class="custom-control-label font-weight-normal">{{ __('role.label_check_all') }}</label>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>{{ __('role.column_modules') }}</th>
                                <th>{{ __('role.column_actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($modules as $module)
                                <tr>
                                    <td>{{ $module }}</td>
                                    <td>
                                        @foreach ($permissions as $key => $row)
                                            @if (Utl::getModuleFromPermission($row) == $module)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox clickcheckbox" type="checkbox" id="checkbox-{{ $key }}" data-id="{{ $key }}"
                                                           name="permissions[]" value="{{ $key }}">
                                                    <label for="checkbox-{{ $key }}"
                                                           class="custom-control-label font-weight-normal">{{ $row }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">{{ __('role.button_submit') }}</button>
                </div>
            </div>
        </div>
    @endcan
</div>
</form>
@stop

@push('css')
<link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')

    <script>
        "use strict";
        $('#checkAll').change(function() {
            $('#checkAllBox input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush

@section('footer')
@include('layouts.partials._footer')
@stop
