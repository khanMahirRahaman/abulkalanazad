@extends('adminlte::page')

@section('title', 'Calendar Event')

@section('content_header')
    <x-breadcrumbs title="Calendar Event" currentActive="Calendar Event" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Calendar Event</h3>
                    <a href="{{ route('calendar.event.create') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-plus-circle mr-1"></i> Add Calendar Event</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="event-table" class="table table-bordered table-hover">
                            <thead>
                                <th style="width: 40px">S/L</th>
                                <th>Image</th>
                                <th>Event Name</th>
                                <th>Event Date</th>
                                <th>Event Description</th>
                                <th style="width: 100px">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($calendar_events as $calendar_event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img style="width: 80px; height:80px; border-radius:50%"
                                                src="{{ asset('uploads/calendar/' . $calendar_event->image) }}" alt="image">
                                        </td>
                                        <td>{{ $calendar_event->event_name }}</td>
                                        <td>{{ $calendar_event->event_date }}</td>
                                        <td>{{ $calendar_event->event_desc }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('calendar.event.edit', $calendar_event->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('calendar.event.delete', $calendar_event->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/pace-progress/themes/blue/pace-theme-minimal.css') }}">
@endpush

@push('js')
    <script src="{{ asset('vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    @include('layouts.partials._datatables')
    @include('layouts.partials._switch_lang')
    @include('layouts.partials._notification')

    @if ($errors->has('file'))
        <script>
            toastr.error("{{ $errors->first('file') }}")
        </script>
    @endif
    <script>
        $('#event-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    </script>
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
