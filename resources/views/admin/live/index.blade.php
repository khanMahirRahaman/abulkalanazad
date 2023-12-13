@extends('adminlte::page')

@section('title', 'Live')

@section('content_header')
    <x-breadcrumbs title="Live" currentActive="Live" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Live</h3>
                    <a href="{{ route('live.create') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-plus-circle mr-1"></i> Add Live</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="video-url-table" class="table table-bordered table-hover">
                            <thead>
                                <th style="width: 40px">S/L</th>
                                <th>Title</th>
                                <th>Link</th>
                                <th style="width: 100px">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($lives as $live)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$live->title}} </td>
                                        <td>{{ $live->link}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('live.edit', $live->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('live.delete', $live->id) }}">Delete</a>
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
        $('#video-url-table').DataTable({
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
