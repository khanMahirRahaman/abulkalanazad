@extends('adminlte::page')

@section('title', 'Add New Calendar Event')

@section('content_header')
    <x-breadcrumbs title="Add New Calendar Event" currentActive="{{ __('general.breadcrumb_add_new') }}" />
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add New Calendar Event</h3>
                    <a href="{{ route('calendar.event.index') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-list mr-1"></i> View List</a>
                </div>
                <form action="{{ route('calendar.event.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="eventName">Event Name</label>
                            <input type="text" name="event_name"
                                class="form-control {{ $errors->has('event_name') ? 'is-invalid' : '' }}" id="event_name"
                                placeholder="Enter event name" required autofocus>
                            @if ($errors->has('event_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('event_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="videoUrl">Event Date</label>
                            <input type="date" name="event_date"
                                class="form-control {{ $errors->has('event_date') ? 'is-invalid' : '' }}" id="event_date"
                                 required autofocus>
                            @if ($errors->has('event_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('event_date') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="eventDescription">Event Description</label>
                           <textarea class="form-control {{ $errors->has('event_desc') ? 'is-invalid' : '' }}"   name="event_desc" id="event_desc" cols="3" rows="3"></textarea>
                            @if ($errors->has('event_desc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('event_desc') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            @if ($errors->has('image'))
                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
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
        $("#image").change(function() {
            readURL(this);
        });
    </script>
    @include('layouts.partials._notification')
    @include('layouts.partials._switch_lang')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
