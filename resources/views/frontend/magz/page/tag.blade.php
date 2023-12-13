@extends('frontend.magz.index')

@section('content')
    <section class="tag">
        <div class="container-md">
            <div class="row">
                <div class="col-lg-8 text-left">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{ __('theme_magz.home') }}</a></li>
                                <li class="breadcrumb-item active">{{ $term->name }}</li>
                            </ol>
                            <h1 class="page-title">{{ __('theme_magz.tag') }}: {{ $term->name }}</h1>
                            <p class="page-subtitle">{{ __('theme_magz.showing_all_posts_with_tag') }}
                                <i>{{ $term->name }}</i>
                            </p>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="row">
                        @foreach ($paginate_posts as $post)
                            <article class="col-md-12 article-list">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ Settings::linkPost($post) }}">
                                            <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}"
                                                alt="{{ $post->post_image }}">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <div class="detail">
                                            @if ($term->name)
                                                <div class="category">
                                                    <a href="{{ route('category.show', $term->slug) }}">
                                                        {{ $term->name }}
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="time">
                                                {{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}
                                            </div>
                                        </div>
                                        <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></h1>
                                        <p>{!! \Str::limit(strip_tags($post->post_content), 100) !!}</p>
                                        <footer>
                                            <a href="javascript:void(0);" class="love"
                                                data-id="{{ $hashids->encode($post->id) }}"><i
                                                    class="ion-android-favorite-outline"></i>
                                                <div>{{ $post->like }}</div>
                                            </a>
                                            <a class="btn btn-primary more" href="{{ Settings::linkPost($post) }}">
                                                <div>{{ __('theme_magz.more') }}</div>
                                                <div><i class="ion-ios-arrow-thin-right"></i></div>
                                            </a>
                                        </footer>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div class="col-lg-12 text-center">
                            {{ $paginate_posts->links('frontend.magz.inc._pagination') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar">
                    @include('frontend.magz.template-parts.sidebar-posts')
                </div>
            </div>
            @include('frontend.magz.template-parts.latest-news')
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="img-banner">
                    <a href="#"><img src="/popup/bfooter-new.png" alt=""></a>
                </div>
            </div>
        </div>
    </section>
@stop
