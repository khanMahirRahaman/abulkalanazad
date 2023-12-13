@extends('adminlte::page')

@section('title', __('advertisement.title_edit_adplacement'))

@section('content_header')
    <x-breadcrumbs title="{{ __('advertisement.title_edit_adplacement') }}" currentActive="{{ __('general.breadcrumb_edit') }}" :addLink="[route('placements.index') => __('advertisement.title_adplacements')]"/>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <form action="{{ route('placements.update', [$placement->id]) }}" method="POST" role="form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('advertisement.label_placement') }}</label>
                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('advertisement.placeholder_placement') }}" value="{{ $placement->name }}" required disabled>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div id="ad_default" class="form-group">
                            <label for="ad_unit">{{ __('advertisement.label_adunit') }}</label>
                            <select id="ad_unit" name="ad_unit" class="select2 form-control" data-placeholder="{{ __('advertisement.placeholder_adunit') }}" style="width: 100%;">
                                @if($ad != '')
                                    <option value="{{ $ad->id }}" selected="selected">{{ $ad->name .'('.$ad->size.')'}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">{{ __('advertisement.button_placement_update') }}</button>
                        <a href="{{ route('placements.index') }}" class="btn btn-warning">{{ __('advertisement.button_back') }}</a>
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
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
    @include('admin.placement._script')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
