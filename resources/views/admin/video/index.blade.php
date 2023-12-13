@extends('adminlte::page')

@section('title', 'Video')

@section('content_header')
    <x-breadcrumbs title="Video" currentActive="Video" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Video</h3>
                    <a href="{{ route('video.create') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-plus-circle mr-1"></i> Add Video</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="video-url-table" class="table table-bordered table-hover">
                            <thead>
                                <th style="width: 40px">S/L</th>
                                <th>Thumnail</th>
                                <th>Video Url</th>
                                <th style="width: 100px">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (isset($video->thumnail))
                                                <img style="width: 80px; height:80px; border-radius:50%"
                                                    src="{{ asset('uploads/video/' . $video->thumnail) }}" alt="thumnail">
                                            @else
                                                <img style="width: 80px; height:80px; border-radius:50%"
                                                    src="{{ asset('img/video-default-thumnail.png') }}" alt="thumnail">
                                            @endif

                                        </td>
                                        <td>{{ $video->url }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('video.edit', $video->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('video.delete', $video->id) }}">Delete</a>
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
