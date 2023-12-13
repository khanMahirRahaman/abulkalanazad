<style>
    @font-face {
        font-family: 'Hind Shiliguri';
        src: url('../font/HindSiliguri-Regular.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;

    }

    a {
        color: #000 !important;
        text-decoration: none !important;
    }

    section {
        font-family: 'Hind Shiliguri';

    }

    .mini-sidebar {

        top: 122px;
        left: 120px;
        width: 30px;
        height: 112px;
        /* UI Properties */
        background: #1A997D 0% 0% no-repeat padding-box;
        opacity: 1;
    }

    .page-title {
        text-align: left;
        font: normal normal 600 264%/160% Hind Siliguri;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
        margin-left: -8%;
    }

    .page-subtitle {
        font: normal normal normal 85%/70% Hind Siliguri;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
        margin-left: -8%;

    }

    .details {
        width: 50%%;
        margin-left: 53%;
        padding: 5px;
    }

    .article img {
        top: 268px;
        left: 123px;
        width: 409px;
        height: 230px;
        /* UI Properties */
        opacity: 1;
    }

    .detail .headers b {

        width: 100%;
        font: normal normal 600 Hind Siliguri;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
        font-size: 325%;
        font-family: 'Hind Shiliguri';

    }

    .detail p {

        width: 100%;
        font-family: 'Hind Shiliguri';

        font: normal normal normal Hind Siliguri;
        letter-spacing: 0px;
        color: #000000;
        opacity: 1;
        font-size: 135%;
        padding: 0% 1%;
    }


    .bar {
        margin: 2% 0%;
    }

    .category {
        margin-top: -10%;
        padding: 0% 5%;
    }

    .more {
        font-size: 100%;
        padding: 2% 1%;
        /* text-align: center; */
        letter-spacing: 0px;
        color: #FFFFFF;
        opacity: 1;
        background: #1C81C4;
        border: white;
        /* margin-top: -1%; */
        width: 18%;
        margin-left: 80%;
    }
</style>

@extends('frontend.magz.index')
@section('content')
    <title>Sheikh Hasina | {{ $week }}th Week</title>
    <section class="category">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bar">
                        <div class="row">
                            <div class="col-lg-1 col-6">
                                <div class="mini-sidebar"></div>
                            </div>
                            <div class="col-lg-7 col-6">
                                <h1 class="page-title">{{ Posts::dateConverter($week) }} তম সপ্তাহ</h1>
                                <div class="row">
                                    <p class="page-subtitle"><b>{{ Posts::dateConverter(date('d F', strtotime($start))) }} -
                                            {{ Posts::dateConverter(date('d F', strtotime($end))) }} এর সকল সংবাদ</b> </p>
                                </div>
                            </div>
                            <div class="col-lg-1 col-6">
                                <a href="#"><img src="/img/fb.svg" alt=""></a>
                            </div>
                            <div class="col-lg-1 col-6">
                                <a href="#"><img src="/img/yt.svg" alt=""></a>
                            </div>
                            <div class="col-lg-1 col-6">
                                <a href="#"><img src="/img/in.svg" alt=""></a>
                            </div>
                            <div class="col-lg-1 col-6">
                                <a href="#"><img src="/img/tw.svg" alt=""></a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="bar"></div>

            <div class="row">
                <div class="col-md-8 col-sm-12 text-left">

                    <div class="row">
                        @foreach ($paginate_posts as $post)
                            <article class="col-lg-12 article-list">
                                <div class="inner">
                                    <figure>
                                        <div class="article"> <a href="{{ Settings::linkPost($post) }}"><img
                                                    src="{{ asset('/images/' . $post->post_image) }}"
                                                    alt="{{ $post->post_image }}"></a></div>
                                    </figure>
                                    <div class="details">
                                        <div class="detail">
                                            <div class="row">
                                                <div class="headers"><b><a
                                                            href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></b>

                                                    <p>{!! \Str::limit(strip_tags($post->post_content), 100) !!}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <footer class="more-btn">
                                            <a href="javascript:void(0);" class="love"
                                                data-id="{{ $hashids->encode($post->id) }}"><i
                                                    class="ion-android-favorite-outline"></i>
                                                <div>{{ $post->like }}</div>
                                            </a>
                                            <a class="btn btn-primary" href="{{ Settings::linkPost($post) }}">
                                                বিস্তারিত পড়ুন

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
                <div class=" col-md-4 col-sm-12  ">
                    <div><img class="w-100" src="/popup/body/Image 107.png" alt="">
                    </div> <br>
                    <div><img class="w-100" src="/popup/body/Mask Group 44.png" alt="">
                    </div> <br>
                    <div><img class="w-100" src="/popup/body/Image 105.png" alt="">
                    </div> <br>
                    <div><img class="w-100" src="/popup/body/Image 106.png" alt="">
                    </div> <br>
                </div>

            </div>
            @include('frontend.magz.template-parts.latest-news')
        </div>
        <!--one sigment needed from home page -->

        </div>
    </section>
@stop
