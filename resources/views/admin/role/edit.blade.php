@extends('adminlte::page')

@section('title', __('role.title_edit_role'))

@section('content_header')
    <x-breadcrumbs title="{{ __('role.title_edit_role') }}" currentActive="{{ __('general.breadcrumb_edit') }}" :addLink="[route('roles.index') => __('role.title_roles')]"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('roles.update', [$role->id]) }}" method="POST" role="form">
                @method('PUT')
                @csrf
                <input type="hidden" id="{{ $role->id }}" name="role_id">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('role.card_title_role') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('role.label_name') }}</label>
                            <input type="text" name="name"
                                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                                   placeholder="{{ __('role.placeholder_name') }}" value="{{ $role->name }}" @if(!$status) disabled @endif required autofocus>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" @if(!$status) disabled @endif>{{ __('role.button_update') }}</button>
                    </div>
                </div>
            </form>
        </div>
        @can('read-permissions')
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('role.card_title_change_role_permission') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row" id="checkAllBox">
                            <div class="col-md-12 text-center mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input checkbox" type="checkbox" id="checkAll" @if($ifCheckAll) checked @endif>
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
                                                           name="permissions[]" value="{{ $key }}"
                                                        {{ in_array($key, $rolePermissions) ? "checked" : "" }}>
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
                </div>
            </div>
        @endcan
    </div>
@stop

@section('plugins.Toastr', true)

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    <script>
        "use strict";
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content")
            }
        })
        $('#checkAll').change(function() {
            $('#checkAllBox input:checkbox').not(this).prop('checked', this.checked);
            let role_id = $('input[name=role_id]').attr('id'),
                status = '';
            if( $(this).prop('checked')) {
                status = 'true';
            }else {
                status = 'false';
            }
            $.ajax({
                method: 'PATCH',
                url: '/admin/change-all-permission',
                data: {
                    'role_id': role_id,
                    'status': status
                },
                dataType: 'json',
                success: function(resp) {
                    if (resp.success) {
                        toastr.success(resp.success);
                    } else if (resp.info) {
                        toastr.info(resp.info);
                    } else {}
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            })
        });
        $('.clickcheckbox').on('click', function() {
            let permission_id = $(this).data('id'),
                role_id = $('input[name=role_id]').attr('id'),
                status = this.hasAttribute('checked');
            $.ajax({
                method: 'PATCH',
                url: '/admin/change-permission',
                data: {
                    'permissions': permission_id,
                    'role_id': role_id,
                    'status': status
                },
                dataType: 'json',
                success: function(resp) {
                    if (resp.success) {
                        toastr.success(resp.success);
                    } else if (resp.info) {
                        toastr.info(resp.info);
                    } else {}
                }
            })
        })
    </script>
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
