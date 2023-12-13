@extends('adminlte::page')

@section('title', __('dashboard.title_dashboard'))

@section('content_header')
    <h1>{{ __('dashboard.title_dashboard') }}</h1>
@stop

@section('content')
    <div class="row">
        @can('read-posts')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('posts.index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.posts') }}</span>
                            <span class="info-box-number">{{ Utl::postCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('read-pages')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('pages.index') }}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-copy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.pages') }}</span>
                            <span class="info-box-number">{{ Utl::pageCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        <div class="clearfix hidden-md-up"></div>

        @can('read-categories')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('categories.index') }}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.categories') }}</span>
                            <span class="info-box-number">{{ Utl::categoryCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('read-tags')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('tags.index') }}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbtack"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.tags') }}</span>
                            <span class="info-box-number">{{ Utl::tagCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('read-users')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('users.index') }}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.users') }}</span>
                            <span class="info-box-number">{{ Utl::userCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('read-roles')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('roles.index') }}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-fuchsia elevation-1"><i class="fas fa-user-shield"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.roles') }}</span>
                            <span class="info-box-number">{{ Utl::roleCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('read-contacts')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('contacts.index') }}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-olive elevation-1"><i class="fas fa-envelope"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.contacts') }}</span>
                            <span class="info-box-number">{{ Utl::contactCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan

        @can('read-galleries')
            <div class="col-12 col-sm-6 col-md-3">
                <a class="link-info-box" href="{{ route('galleries.index') }}">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-hdd"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">{{ __('dashboard.galleries') }}</span>
                            <span class="info-box-number">{{ Utl::galleryCount() }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endcan
    </div>

    @if(env('ANALYTICS_VIEW_ID'))
        @can('read-analytics')
            @if(Settings::check_connection())
                @if(Settings::checkCredentialFileExists())
                    <h4 class="head-analytics mt-4 mb-4"><span class="title-google-analytics">{{ __('analytics.title_google_analytics') }}</span> <small class="link-analytics-detail">(<a href="{{ route('analytics.index') }}">{{ __('analytics.link_see_more') }}</a>)</small></h4>
                    <div class="row">
                        <div class="col-md-4">
                            @include('admin.analytics._device')
                        </div>
                        <div class="col-md-8">
                            @include('admin.analytics._visitors_pageviews')
                        </div>
                    </div>
                @endif
            @endif
        @endcan
    @endif
@stop

@push('css')
    <style>
        .card {
            box-shadow: none;
            border: 1px solid rgba(0, 0, 0, .125);
        }
        .link-info-box {
            color: #000;
        }
    </style>
@endpush

@push('js')
    @include('layouts.partials._switch_lang')
    @include('admin.analytics._script')
@endpush

@section('footer')
    @include('layouts.partials._footer')
@stop
