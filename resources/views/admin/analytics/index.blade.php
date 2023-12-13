@extends('adminlte::page')

@section('title', __('analytics.title_google_analytics'))

@section('content_header')
    <x-breadcrumbs title="{{ __('analytics.title_google_analytics') }}" currentActive="{{ __('analytics.title_google_analytics') }}"/>
@stop

@section('content')
    @empty(env('ANALYTICS_VIEW_ID'))
    @else
        @can('read-analytics')
            @if(Settings::check_connection())
                @if(Settings::checkCredentialFileExists())
                    <div class="row">
                        <div class="col-md-4">
                            @include('admin.analytics._device')
                        </div>
                        <div class="col-md-8">
                            @include('admin.analytics._visitors_pageviews')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.analytics._pages')
                        </div>
                        <div class="col-md-6">
                            @include('admin.analytics._browser')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.analytics._operating_system')
                        </div>
                        <div class="col-md-6">
                            @include('admin.analytics._country')
                        </div>
                    </div>
                @endif
            @endif
        @endcan
    @endempty
@endsection

@push('js')
    @include('layouts.partials._switch_lang')
    @include('admin.analytics._script')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
