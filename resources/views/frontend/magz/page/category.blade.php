@extends('frontend.magz.index')

@section('content')
<div class="custom-container-sh">
    <section class="category">
        <div class="row">
            <div class=" col-12 text-left">
                <div class="d-flex section-title">
                    <div class="mr-auto p-2">
                        <a href="#">
                            <div class="flexbox-2">
                                <b>{{ $term->name }}</b>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bar"></div>
            </div>
            <div class="col-lg-9 col-sm-12 text-left">
                <div class="row">
                    @foreach ($paginate_posts as $post)
                    <article class="col-lg-4 article-list">
                        <div class="inner">
                            <figure>
                                <div class="article">
                                    <a href="{{ Settings::linkPost($post) }}">
                                        <img src="{{ asset('/images/' . $post->post_image) }}"
                                            alt="{{ $post->post_image }}">
                                    </a>
                                </div>
                            </figure>
                        </div>
                    </article>
                    <article class="col-lg-8 article-list">
                        <div class="headers">
                            <h4>
                                <a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a>
                            </h4>
                            <span><svg style="margin-top: -2px" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>&nbsp;{{ Posts::dateConverter(date('d F Y', strtotime($post->created_at))) }}</span>

                            <p class="d-none d-lg-block">@if($post->post_summary) {!!
                                \Str::limit(strip_tags($post->post_summary), 200) !!}@else {!!
                                \Str::limit(strip_tags($post->post_content), 200) !!}@endif</p>

                        </div>

                        <footer class="more-btn d-md-flex d-block justify-content-between">
{{--                            <ul class="m-0 p-0 text-left">--}}
{{--                                <li>--}}
{{--                                    {{ Posts::dateConverter(date('d F Y', strtotime($post->posted_date))) }}--}}
{{--                                    &bull;--}}
{{--                                </li>--}}
{{--                                @if ($post->terms()->category()->first())--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('category.show',$post->terms()->category()->first()->slug) }}">--}}
{{--                                        {{ $post->terms()->category()->first()->name }}--}}
{{--                                    </a> &bull;--}}
{{--                                </li>--}}
{{--                                @endif--}}
{{--                            </ul>--}}
                            <a class="btn btn-primary" href="{{ Settings::linkPost($post) }}">
                                বিস্তারিত পড়ুন
                            </a>
                        </footer>
                    </article>
                    @endforeach

                    <div class="col-lg-12 text-center">
                        {{ $paginate_posts->links('frontend.magz.inc._pagination') }}
                    </div>

                </div>

            </div>
            <div class="col-lg-3 col-sm-12">
                <div>
                    <img class="w-100" src="/popup/body/Image 107.png" alt="">
                </div> <br>
                <div><img class="w-100" src="/popup/body/Mask Group 44.png" alt="">
                </div> <br>
                <div><img class="w-100" src="/popup/body/Image 105.png" alt="">
                </div> <br>
                <div><img class="w-100" src="/popup/body/Image 106.png" alt="">
                </div> <br>
            </div>

    </section>
    @include('frontend.magz.template-parts.latest-news')
</div>
@stop
