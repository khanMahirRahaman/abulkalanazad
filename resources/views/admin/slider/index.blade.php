@extends('adminlte::page')

@section('title', 'Slider List')

@section('content_header')
    <x-breadcrumbs title="Slider List" currentActive="Slider List" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Slider</h3>
                    <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fa fa-plus-circle mr-1"></i> Add Slider</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="slider-table" class="table table-bordered table-hover">
                            <thead>
                                <th style="width: 40px">S/L</th>
                                <th>News Link</th>
                                <th>Slider Image</th>
                                <th style="width: 100px">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$slider->headline}}</td>
                                        <td>{{$slider->link}}</td>
                                        <td>
                                            <img style="height:100px;"
                                                src="{{ asset('uploads/slider/' . $slider->image) }}" alt="image">

                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('slider.edit', $slider->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('slider.delete', $slider->id) }}">Delete</a>
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
        $('#slider-table').DataTable({
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
