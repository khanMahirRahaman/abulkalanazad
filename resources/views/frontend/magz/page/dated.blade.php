@extends('frontend.magz.index')

@section('content')
    <div class="container-md">
        <section class="category">
            <div class="row">
                <div class=" col-12 text-left">
                    <div class="d-flex section-title">
                        <div class="mr-auto p-2">
                            <a href="#">
                                <div class="flexbox-2">
                                    <b>{{ Posts::dateConverter(date('d F', strtotime($dated))) }}</b>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="bar"></div>
                </div>
                <div class="col-md-8 col-sm-12 text-left">
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

                                    <p class="d-none d-lg-block">{!! \Str::limit(strip_tags($post->post_content), 200) !!}</p>

                                </div>

                                <footer class="more-btn d-md-flex d-block justify-content-between">
                                    <ul class="m-0 p-0 text-left">
                                        <li>
                                            {{ Posts::dateConverter(date('d F Y', strtotime($post->posted_date))) }}
                                            &bull;
                                        </li>
                                        @if ($post->terms()->category()->first())
                                            <li>
                                                <a
                                                    href="{{ route('category.show',$post->terms()->category()->first()->slug) }}">
                                                    {{ $post->terms()->category()->first()->name }}
                                                </a> &bull;
                                            </li>
                                        @endif
                                        <li>{{ Posts::dateConverter($post->post_hits) }} বার পঠিত</li>
                                    </ul>
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
                <div class=" col-md-4 col-sm-12">
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
                @include('frontend.magz.template-parts.latest-news')

            </div>
        </section>
    </div>
@stop
