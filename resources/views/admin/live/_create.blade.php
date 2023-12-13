@extends('adminlte::page')

@section('title', 'Add New Live')

@section('content_header')
    <x-breadcrumbs title="Add New Live" currentActive="{{ __('general.breadcrumb_add_new') }}" />
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add New Live</h3>
                    <a href="{{ route('live.index') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-list mr-1"></i> View List</a>
                </div>
                <form action="{{ route('live.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="videoUrl">Live Title</label>
                            <input type="text" name="title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title"
                                placeholder="Enter live Title" required autofocus>
                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="videoUrl">Live Link</label>
                            <input type="text" name="link"
                                   class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="link"
                                   placeholder="Enter live link" required autofocus>
                            @if ($errors->has('link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('link') }}
                                </div>
                            @endif
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
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
