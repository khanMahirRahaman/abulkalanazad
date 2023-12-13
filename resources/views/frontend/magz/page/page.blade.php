@extends('frontend.magz.index')

@section('content')
    <section class="page">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/">{{ __('theme_magz.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ $page->post_title }}</li>
                    </ol>
                    <h1 class="page-title">{{ $page->post_title }}</h1>
                    <p class="page-subtitle">{!! strip_tags($page->post_summary) !!}</p>
                    <div class="line thin"></div>
                    <figure>
                        @if (!empty($page->post_image))
                            <img src="{{ route('image.displayImage', $page->post_image) }}" alt="">
                        @endif
                    </figure>
                    <div class="page-description">
                        {!! html_entity_decode($page->post_content) !!}
                    </div>
                </div>
            </div>
            @include('frontend.magz.template-parts.latest-news')
        </div>
    </section>
@stop
