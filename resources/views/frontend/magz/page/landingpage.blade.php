<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Abul Kalam Azad</title>
    <link rel="icon" sizes="32x32" href="https://www.sheikh-hasina.info/icon/icon-JqECkOJZpG.png">
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/all.min.css') }}">
    {{--    <link rel="stylesheet" href="{{asset('landing/css/animate.min.css')}}"> --}}
    {{--    <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.min.css')}}"> --}}
    {{--    <link rel="stylesheet" href="{{asset('landing/css/jquery.fancybox.min.css')}}"> --}}
    {{--    <link rel="stylesheet" href="{{asset('landing/css/tooltipster.min.css')}}"> --}}
    {{--    <link rel="stylesheet" href="{{asset('landing/css/cubeportfolio.min.css')}}"> --}}
    {{--    <link rel="stylesheet" href="{{asset('landing/css/revolution/navigation.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('landing/css/revolution/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/custom.css') }}">
    <link href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet"
        type="text/css" />

    <style>
        .azad {
            margin-top: 117px !important;
            width: 580px;
            height: auto !important;
        }

        .transparent-bg {
            left: -281px;
            top: 0;
            position: absolute;
            width: 100%;
        }

        .navbar-brand {
            margin: 21px 433px;
            padding: 0;
            width: 90px;
            position: relative;
        }


        .bg-black {
            background: transparent;
        }

        body {
            font-size: 15px;
            color: #ffffff;
            font-weight: normal;
            font-family: 'Open Sans', sans-serif;
            overflow-x: hidden;
            direction: ltr;
        }

        .container.xl {
            max-width: 1230px;
            padding: 70px;
            padding-left: 150px;
            padding-right: 150px;
            text-align: center;
            font-family: HindSiliguri;
        }

        .container .xl2 {
            max-width: 1230px;
            padding: 70px;
            padding-left: 150px;
            padding-right: 150px;
            text-align: center;
            font-family: HindSiliguri;
        }

        .bg-gray-901 {
            background-image: url('landing/images/bcg.png');
            background-size: 100% 100%;
            background-position: 100% 100%;
            background-repeat: no-repeat;
            min-height: 1600px;
        }

        .bg-gray-900 {
            background-image: url('landing/images/bcg.png');
            background-size: 100% 100%;
            background-position: 100% 100%;
            background-repeat: no-repeat;
            min-height: 600px;

        }

        .tparrows {
            display: none;
        }

        .gallery {
            margin: 15px;
            border: 2px solid #ccc;
            float: left;
            width: 330px;
            border-radius: 16px;
            overflow: hidden;
        }

        .gallery img {
            width: 100%;
            height: auto;

        }

        .desc {
            padding: 15px;
        }

        .fcolor {
            background-color: #014130;
            position: relative;
            height: 200px;

        }

        .fcolor .foorter-logo {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 20%;
        }
        .link-area-mobile-view{
            display: none;
        }
        .link-area-mobile-view a img{
            height: 100%;
            width: 100%;
        }

        .fcolor .foorter-logo img {
            height: 100%;
        }

        .mp-area {
            background-image: url('landing/images/Background.png');
            background-size: 100% 100%;
            background-position: 100% 100%;
            background-repeat: no-repeat;
            min-height: 700px;
        }

        .sign img {
            margin-top: 180px;
            width: 459px;

        }
    </style>

</head>

<body>
    <!--PreLoader-->
    {{-- <div class="loader">
        <div class="loader-inner">
            <div class="cssload-loader"></div>
        </div>
    </div> --}}
    <!--PreLoader Ends-->
    {{-- <!-- header --> --}}


     <header class="site-header" id="header">


        <nav class="d-flex justify-content-end navbar navbar-expand-lg transparent-bg block static-nav">

            <div class="d-flex justify-content-end ">
                <a class="navbar-brand block" href="/"><img src="{{ asset('landing/images/logoAwami.png') }}"
                        width="100" b-o9t24s5a92></a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto me-3">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/news">Bio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/category/news-on-the-day">Career</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category/sonar-banglar-rupokar">Awards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category/speech">Promises</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--side menu open button-->
            <a href="javascript:void(0)" class="d-inline-block d-md-none sidemenu_btn" id="sidemenu_toggle">
                <span></span> <span></span> <span></span>
            </a>
        </nav>
        <!-- side menu -->
        <div class="side-menu opacity-0 gradient-bg">
            <div class="overlay"></div>

            <div class="inner-wrapper">
                <a class="navbar-brand" href="/"><img src="{{ asset('landing/images/logoAwami.png') }}"
                        width="100" b-o9t24s5a92></a>

                <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Bio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Career</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Awards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Promises</a>
                        </li>
                    </ul>
                </nav>
                <div class="side-footer w-100">
                    <ul class="social-icons-simple white top40">
                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="close_side_menu" class="tooltip"></div>
        <!-- End side menu -->
    </header>
    {{-- <!-- header --> --}}
    <!--Some Feature -->
    <section>
        {{-- <div> <img src="{{ asset('landing/images/.png') }}" alt=""></div> --}}

    </section>

    <style>
        @media screen and (min-width: 992px) {
            .container.xl3 {
                padding-left: 50px;
                padding-right: 350px
            }

            .link-area img {
                /* text-align: center; */
                margin-top: 0px;
                padding: 10px;
                padding-left: 500px;
                width: 1000px;
                height: auto;
            }


        }

        @media screen and (max-width: 600px) {
            .image-wrapper{
                margin-top: 82px !important;
            }
            .link-area-mobile-view{
            display: block;
        }
        .link-area {
            display: none;
        }

            .row .order-swap {
                order: 1;
            }
            .fcolor {
                height: 100px;
            }

            .fcolor .foorter-logo {
                width: 52%;
            }

            .link-area a img {
                height: 100%;
                width: 100%;
            }

            .fcolor .foorter-logo img {
                height: 100%;
                width: 100%;
            }

            .gallery {
                margin: 5px;
                border: 1px solid #ccc;
                float: left;
                width: 190px;
                border-radius: 16px;
                overflow: hidden;
                text-align: center;
            }

            .sidemenu_btn {
                margin-right: -286px;
            }

            .block {
                display: none;
            }

            .gallery img {
                width: 100%;
                height: auto;

            }

            .desc {
                padding: 10px;
                font-size: 12px;
            }

            .bg-gray-900 {
                background-image: url('landing/images/bcg.png');
                background-size: 100% 100%;
                background-position: 100% 100%;
                background-repeat: no-repeat;
                min-height: 1000px;

            }

            .container.xl {
                padding: 40px;
                padding-left: 45px;
                padding-right: 45px;
                text-align: center;
                font-size: 8px
            }

            .container.xl2 {
                padding: 9px;
                padding-left: 58px;
                padding-right: 61px;
                text-align: center;
            }

            .mp-area {
                background-image: url('landing/images/Background.png');
                background-size: 100% 100%;
                background-position: 100% 100%;
                background-repeat: no-repeat;
                min-height: 700px;
            }

            .link-area {
                text-align: center;
                margin-top: 0px;
                padding: 10px;
            }

            .sign img {
                margin-top: 76px;
                width: 215px;
            }

            .text {
                font-size: 10px;
            }

            .azad {
                margin-top: -5px !important;
                width: 287px;
                height: auto !important;
            }
        }
    </style>


    <div class="mp-area">
        <div class="container xl3">
            <div class="row">
                <div class="col-lg-8 order-swap">
                    <div class="sign">
                        <img alt="sign" src="{{ asset('landing/images/sign.png') }}">
                    </div>
                    <div class="text">
                        <p><span>জামালপুর-৫ (সদর) আসন র্প্রাথী, <br> বাংলাদেশ আওয়ামী লীগ</span></p>
                        <p>জামালপুরের সন্তান জনাব মোঃ আবুল কালাম আজাদ ১৯৫৭ সালের ৭ <br>জানুয়ারি জন্মগ্রহণ
                            করেন এবং জামালপুর শহরের দেওয়ানপাড়ায় বেড়ে ওঠেন। <br>তিনি ঢাকা বিশ্ববিদ্যালয়
                            থেকে আইন বিভাগে অনার্স ও মাস্টার্স ডিগ্রী অর্জন<br> করেন। ১৯৮২ সালে বাংলাদেশ
                            সিভিল সার্ভিসের প্রশাসন ক্যাডারে যোগদান করে <br>একাধারে ম্যাজিস্ট্রেট, ইউএনও,
                            জেলা প্রশাসক, সচিব, সিনিয়র সচিব, মাননীয় <br>প্রধানমন্ত্রীর মুখ্য সচিব হিসেবে
                            দায়িত্ব পালন করেছেন। দীর্ঘ বৈচিত্র্যময় কর্মজীবনে<br> তিনি সততা, দক্ষতার
                            চূড়ান্ত নজির স্থাপন করেছেন এবং নীতির সাথে বিন্দুমাত্র<br> আপোষ করেননি।</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="image-wrapper">
                        <img style="margin-top: 100px" class="azad mt-5"
                        style="width: 50px !important; height:auto !important" alt="sign"
                        src="{{ asset('landing/images/abulkalamazad.png') }}">
                        <div class="link-area-mobile-view">
                            <a href="/"><img alt="sign" src="{{ asset('landing/images/chanel.png') }}"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="link-area">
            <a href="/"><img alt="sign" src="{{ asset('landing/images/chanel.png') }}"></a>
        </div>
    </div>

    <section class="text-w-big-image section-heading bg-gray-901 color-white">
        <div class="container xl">
            <div class="desc">
                <p><span style="font-weight: 400;">২০০৯ সালে তিনি যখন বিদ্যুৎ বিভাগের সচিবের দায়িত্ব গ্রহণের পর
                        মাননীয় প্রধানমন্ত্রী শেখ হাসিনার পরামর্শক্রমে বিদ্যুৎ খাতে দেশে বৈপ্লবিক পরিবর্তন আনতে সক্ষম
                        হন। “শেখ হাসিনার উদ্যোগ ঘরে ঘরে বিদ্যুৎ” স্লোগান ধারণ করে সারাদেশে বিদ্যুৎ উৎপাদন ও বিতরণ
                        ব্যবস্থায় গতিশীলতার মাধ্যমে ব্যাপক প্রশংসিত হন।</span></p>
                <p><span style="font-weight: 400;">তিনি বাংলাদেশ স্কাউটস এবং বিশ্ব স্কাউটস আন্দোলনের একজন প্রথম সারির
                        নেতৃত্বদানকারী এবং বর্তমানে বাংলাদেশ স্কাউটসের সভাপতি হিসেবে দায়িত্ব পালন করছেন। তার সততা,
                        দক্ষতা, একাগ্রতা ও উদ্ভাবনীমূলক গুণাবলীর কারণে মুখ্য সচিব হিসেবে নিয়মিত চাকরির অবসরের পর
                        মাননীয় প্রধানমন্ত্রী তাকে এসভিজি (সাসটেইনেবল ডেভেলপমেন্ট গোল) বিষয়ক প্রধান সমন্বয়কের দায়িত্ব
                        প্রদান করেন। মাননীয় প্রধানমন্ত্রীর একজন আস্থাভাজন কর্মী হিসেবে তিনি জামালপুরসহ সারা বাংলাদেশের
                        উন্নয়নমূলক কর্মকান্ডের মাধ্যমে জাতির পিতার স্বপ্ন পূরণে নিজেকে নিয়োজিত করেছেন।</span></p>
            </div><br><br><br>
            <h3>কর্মজীবন</h3><br><br>
            <h4>মুখ্য সচিব</h4>
            <p><span style="font-weight: 500;">প্রধানমন্ত্রীর কার্যালয় - ১৭ই ফেব্রুয়ারি ২০১৫</span></p>
            <h4>সিনিয়র সচিব</h4>
            <p><span style="font-weight: 500;"> প্রধানমন্ত্রীর কার্যালয় - ১৯ই জানুয়ারি ২০১৪</span></p>
            <h4>সচিব</h4>
            <p><span style="font-weight: 500;">অর্থনৈতিক সম্পর্ক বিভাগ (এআরডি), অর্থমন্ত্রণ মন্ত্রণালয় - ২য় ডিসেম্বর
                    ২০১২</span></p>
            <h4>সচিব</h4>
            <p><span style="font-weight: 500;">বিদ্যুৎ বিভাগ, বিদ্যুৎ শক্তি ও খনিজ সম্পদ মন্ত্রণালয় - ২৭ই মে
                    ২০০৯</span></p>
            <h4>অতিরিক্ত সচিব </h4>
            <p><span style="font-weight: 500;">স্বাস্থ্য মন্ত্রণালয় - ১৫ই জানুয়ারি ২০০৮</span></p>
            <h4>যুগ্ন সচিব</h4>
            <p><span style="font-weight: 500;">জনপ্রশাসন মন্ত্রণালয় - ৮ই মার্চ ২০০৭</span></p>
            <h4>জাতীয় পরামর্শক</h4>
            <p><span style="font-weight: 500;">ইউএনডিপি, ঢাকা - ১৩ই ডিসেম্বর ২০০৬</span></p>
            <h4> পরিচালক </h4>
            <p><span style="font-weight: 500;">বিপাটসি, সাভার, ঢাকা - ১২ই মার্চ ২০০৬</span></p>
            <h4>সিইও</h4>
            <p><span style="font-weight: 500;">জেলা পরিষদ, নওগাঁ/নেত্রকোণা - ২৪ই ডিসেম্বর ২০০১</span></p>
            <h4>উপ-সচিব </h4>
            <p><span style="font-weight: 500;">স্বাস্থ্য ও পরিবার কল্যাণ মন্ত্রণালয় - ১ই অগাস্ট ২০০১</span></p>
            <h4>ডিপুটি কমিশনার </h4>
            <p><span style="font-weight: 500;">ডিসি অফিস, মানিকগঞ্জ - ৪ই এপ্রিল ২০০১</span></p>
            <h4>পরিচালক </h4>
            <p><span style="font-weight: 500;">প্রধানমন্ত্রীর কার্যালয় - ১২ই জানুয়ারি ১৯৯৮</span></p>
            <h4>ডিপুটি সচিব </h4>
            <p><span style="font-weight: 500;">বিসিএস একাডেমি - ২য় জুন ১৯৯৭</span></p>
            <h4>অতিরিক্ত ডিপুটি কমিশনার </h4>
            <p><span style="font-weight: 500;">ডিসি অফিস, গাজীপুর - ১৮ই অক্টোবর ১৯৯৪</span></p>
            <h4> ডিপুটি ডিরেক্টর </h4>
            <p><span style="font-weight: 500;">বিসিএস একাডেমি - ৭ই সেপ্টেম্বর ১৯৯৩</span></p>
            <h4>উচ্চতর সহকারী সচিব </h4>
            <p><span style="font-weight: 500;">প্রধানমন্ত্রীর কার্যালয় - ৬ই জুলাই ১৯৯২</span></p>
            <h4>উপজেলা নির্বাহী অফিসার </h4>
            <p><span style="font-weight: 500;">পারবতীপুর, দিনাজপুর/কাটিয়াদি, কিশোরগঞ্জ - ২৫ই আগস্ট ১৯৮৮</span></p>
            <h4>নেজারত ডেপুটি কলেক্টর </h4>
            <p><span style="font-weight: 500;">ডিসি অফিস, পাবনা - ১৬ই জুন ১৯৮৮</span></p>
            <h4>সহকারী কমিশনার </h4>
            <p><span style="font-weight: 500;">সিভিল অফিসার্স ট্রেনিং একাডেমি, ঢাকা - ২৭ই অক্টোবর ১৯৮২</span></p>
            <h4>ডিসি অফিস </h4>
            <p><span style="font-weight: 500;">দিনাজপুর ও ডিসি অফিস, পাবনা</span></p>
        </div>
    </section>

    <section class="text-w-big-image section-heading bg-gray-900 color-white">
        <div class="container xl2">
            <div class="gallery">
                <img src ="{{ asset('landing/images/newspic.png') }}">
                <div class ="desc"> add a discription</div>

            </div>
            <div class="gallery">
                <img src ="{{ asset('landing/images/newspic.png') }}">
                <div class ="desc"> add a discription</div>

            </div>
            <div class="gallery">
                <img src ="{{ asset('landing/images/newspic.png') }}">
                <div class ="desc"> add a discription</div>

            </div>
            <div class="gallery">
                <img src ="{{ asset('landing/images/newspic.png') }}">
                <div class ="desc"> add a discription</div>

            </div>
            <div class="gallery">
                <img src ="{{ asset('landing/images/newspic.png') }}">
                <div class ="desc"> add a discription</div>

            </div>
            <div class="gallery">
                <img src ="{{ asset('landing/images/newspic.png') }}">
                <div class ="desc"> add a discription</div>

            </div>
        </div>
    </section>
    <footer>
        <div class="fcolor">
            <div class="foorter-logo">
                <img src="{{ asset('landing/images/redlogo.png') }}" alt="">
            </div>
        </div>
    </footer>


    {{-- <section id="about" class="bg-container"> --}}
    {{--    <div class="bg-mask"> --}}
    {{--        <div class="button-text" data-bs-toggle="modal" data-bs-target="#about-modal"> --}}
    {{--            <h3 class="home-title">ABOUT ME</h3> --}}
    {{--            <button type="button" class="btn"> --}}
    {{--                <img src="{{asset('landing/images/plus-btn.svg')}}"> --}}
    {{--            </button> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    {{-- </section> --}}



    {{-- <!-- Modal --> --}}
    {{-- <div class="modal fade" id="about-modal" tabindex="-1" aria-labelledby="about-modal" aria-hidden="true"> --}}
    {{--    <div class="modal-dialog modal-fullscreen"> --}}
    {{--        <div class="modal-content"> --}}
    {{--            <div class="modal-header"> --}}
    {{--                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i> </button> --}}
    {{--            </div> --}}
    {{--            <div class="modal-body"> --}}
    {{--                <div class="container"> --}}
    {{--                    <div class="row text-center"> --}}
    {{--                        <div class="col-lg-6 about-me-horizontal-line"> --}}
    {{--                            <div class="about-me-modal-left-content"> --}}
    {{--                                <h2 class="modal-title text-light mb-3">ABOUT ME</h2> --}}
    {{--                                <p >Sheikh Hasina, the Prime Minister of the Government of the People’s Republic of Bangladesh, assumed the office on 07 January 2019 --}}
    {{--                                    for the fourth time after her party Awami League-led grand alliance won the December 30, 2018 11th Parliamentary elections. --}}
    {{--                                    Sheikh Hasina, the Prime Minister of the Government of the People’s Republic of Bangladesh, assumed office on January 12, --}}
    {{--                                    2014 for the third time after the grand alliance led by her party Bangladesh Awami League won parliamentary election on 5th of --}}
    {{--                                    January. She became prime minister for the first time on June 23, 1996 when her party Bangladesh Awami League acquired majority --}}
    {{--                                    in the general election held on June 12, 1996. After the term, conspiracy designed by the then caretaker government led Bangladesh --}}
    {{--                                    Awami League to lose the general election in 2001 and Sheikh Hasina became the leader of the opposition again. A military-backed --}}
    {{--                                    caretaker government took over the office in 2007 as the BNP-Jamaat government failed to hand over power in a peaceful manner in 2006. --}}
    {{--                                    After two years in the office, the caretaker government organized the 9th general election on December 29, 2008. Sheikh Hasina’s party --}}
    {{--                                    earned a landslide victory with a two-third majority in the widely acclaimed free and fair election leading her taking over the office --}}
    {{--                                    of the prime minister for the second time on January 6, 2009. Earlier, Sheikh Hasina played crucial role in establishing democracy in the --}}
    {{--                                    country when she won from three constituencies in the parliamentary election in 1986 and was elected leader of the opposition. Following --}}
    {{--                                    the election of 1986, a constitutional process began in the country ending the martial law.</p> --}}
    {{--                            </div> --}}


    {{--                        </div> --}}
    {{--                        <div class="col-lg-6"> --}}
    {{--                            <div class="about-me-modal-right-content"> --}}
    {{--                                <p >Sheikh Hasina Wazed is a Bangladeshi politician and stateswoman who has served as the Prime Minister of Bangladesh since January 2009. Hasina is the daughter of the founding father and first President of Bangladesh, Bangabandhu Sheikh Mujibur Rahman. She previously served as prime minister from June 1996 to July 2001.</p> --}}
    {{--                                <div class="about-me-modal-right-bottom-content"> --}}
    {{--                                    <p><b class="text-light">Born</b>: September 28, 1947 (age 75 years), Tungipara</p> --}}
    {{--                                    <p><b class="text-light">Spouse</b>  M. A. Wazed Miah (m. 1967–2009)</p> --}}
    {{--                                    <p><b class="text-light">Awards</b>  : Glamour Award The Chosen Ones, Indira Gandhi Prize</p> --}}

    {{--                                    <p> <b class="text-light">Children</b> : Sajeeb Wazed, Saima Wazed</p> --}}

    {{--                                    <p><b class="text-light">Full name</b>  : Sheikh Hasina Wazed</p> --}}
    {{--                                    <p><b class="text-light">Grandchild</b> : Sophia Rehana Wazed</p> --}}

    {{--                                </div> --}}



    {{--                            </div> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    {{-- </div> --}}
    {{-- <!-- Modal --> --}}


    {{-- <!-- Modal --> --}}
    {{-- <div class="modal fade" id="news-modal" tabindex="-1" aria-labelledby="news-modal" aria-hidden="true"> --}}
    {{--    <div class="modal-dialog modal-fullscreen"> --}}
    {{--        <div class="modal-content"> --}}
    {{--            <div class="modal-header"> --}}
    {{--                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i> </button> --}}
    {{--            </div> --}}
    {{--            <div class="modal-body"> --}}
    {{--                <div class="container"> --}}
    {{--                    <div class="row "> --}}
    {{--                        <div class="col-lg-12 "> --}}
    {{--                            <div class="gallery-modal-content"> --}}
    {{--                                <h2 class="modal-title text-light mb-3">News</h2> --}}

    {{--                                <div class="news-card-area"> --}}
    {{--                                    <div class="row"> --}}
    {{--                                        @foreach ($news as $item) --}}
    {{--                                        <div class="col-lg-4"> --}}
    {{--                                            <div class="news-image-wrapper"> --}}
    {{--                                                <img src="{{asset('/images/'.$item->post_image)}}" alt=""> --}}
    {{--                                            </div> --}}
    {{--                                            <div class="sheikh-hasina-news-title-wrapper"> --}}
    {{--                                                <h5 class="mt-3 text-light"><a href="/news/{{$item->post_name}}">{{$item->post_title}}</a></h5> --}}
    {{--                                            </div> --}}
    {{--                                        </div> --}}
    {{--                                        @endforeach --}}

    {{--                                    </div> --}}
    {{--                                </div> --}}

    {{--                            </div> --}}


    {{--                        </div> --}}

    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    {{-- </div> --}}


    {{-- <!-- Modal --> --}}
    {{-- <div class="modal fade" id="speeches-modal" tabindex="-1" aria-labelledby="speeches-modal" aria-hidden="true"> --}}
    {{--    <div class="modal-dialog modal-fullscreen"> --}}
    {{--        <div class="modal-content"> --}}
    {{--            <div class="modal-header"> --}}
    {{--                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i> </button> --}}
    {{--            </div> --}}
    {{--            <div class="modal-body"> --}}
    {{--                <div class="container"> --}}
    {{--                    <div class="row "> --}}
    {{--                        <div class="col-lg-12 "> --}}
    {{--                            <div class="gallery-modal-content"> --}}
    {{--                                <h2 class="modal-title text-light mb-3">SPEECHES</h2> --}}
    {{--                                <div class="news-card-area"> --}}
    {{--                                    <div class="row"> --}}
    {{--                                        @foreach ($speeches as $item) --}}
    {{--                                            <div class="col-lg-4"> --}}
    {{--                                                <div class="news-image-wrapper"> --}}
    {{--                                                    <img src="{{asset('/images/'.$item->post_image)}}" alt=""> --}}
    {{--                                                </div> --}}
    {{--                                                <div class="sheikh-hasina-news-title-wrapper"> --}}
    {{--                                                    <h5 class="mt-3 text-light"><a href="/news/{{$item->post_name}}">{{$item->post_title}}</a></h5> --}}
    {{--                                                </div> --}}
    {{--                                            </div> --}}
    {{--                                        @endforeach --}}

    {{--                                    </div> --}}

    {{--                                    </div> --}}

    {{--                                </div> --}}

    {{--                            </div> --}}


    {{--                        </div> --}}

    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    </div>
    </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('landing/js/jquery-3.6.0.min.js') }}"></script>
    <!--Bootstrap Core-->
    {{-- <script src="{{asset('landing/js/propper.min.js')}}"></script> --}}
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <!--to view items on reach-->
    {{-- <script src="{{asset('landing/js/jquery.appear.js')}}"></script> --}}
    <!--Owl Slider-->
    {{-- <script src="{{asset('landing/js/owl.carousel.min.js')}}"></script> --}}
    <!--number counters-->
    {{-- <script src="{{asset('landing/js/jquery-countTo.js')}}"></script> --}}
    <!--Parallax Background-->
    {{-- <script src="{{asset('landing/js/parallaxie.js')}}"></script> --}}
    <!--Cubefolio Gallery-->
    {{-- <script src="{{asset('landing/js/jquery.cubeportfolio.min.js')}}"></script> --}}
    <!--Fancybox js-->
    {{-- <script src="{{asset('landing/js/jquery.fancybox.min.js')}}"></script> --}}
    <!--tooltip js-->
    {{-- <script src="{{asset('landing/js/tooltipster.min.js')}}"></script> --}}
    <!--wow js-->
    {{-- <script src="{{asset('landing/js/wow.js')}}"></script> --}}
    <!--Revolution SLider-->
    <script src="{{ asset('landing/js/revolution/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('landing/js/revolution/jquery.themepunch.revolution.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.actions.min.js')}}"></script> --}}
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.carousel.min.js')}}"></script> --}}
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script> --}}
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script> --}}
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.migration.min.js')}}"></script> --}}
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.navigation.min.js')}}"></script> --}}
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.parallax.min.js')}}"></script> --}}
    {{-- <script src="{{asset('landing/js/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script> --}}
    <script src="{{ asset('landing/js/revolution/extensions/revolution.extension.video.min.js') }}"></script>
    <!--custom functions and script-->
    <script src="{{ asset('landing/js/functions.js') }}"></script>

    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js">
    </script>
    <script type="text/javascript">
        //creative agency index
        var revapi = $("#rev_creative").show().revolution({
            sliderType: "standard",
            scrollbarDrag: "true",
            dottedOverlay: "none",
            stopAfterLoops: 0,
            stopAtSlide: 1,
            navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                bullets: {
                    style: "",
                    enable: false,
                    rtl: false,
                    hide_onmobile: false,
                    hide_onleave: false,
                    hide_under: 767,
                    hide_over: 9999,
                    tmp: '',
                    direction: "horizontal",
                    space: 10,
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 0,
                    v_offset: 40
                },
                arrows: {
                    enable: true,
                    hide_onmobile: false,
                    hide_onleave: true,
                    hide_under: 767,
                    left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 20,
                        v_offset: 30
                    },
                    right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 20,
                        v_offset: 30
                    }
                },
                touch: {
                    touchenabled: "on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                }
            },
            viewPort: {
                enable: true,
                outof: "pause",
                visible_area: "90%"
            },

            sliderLayout: $(window).width() >= 767 ? "fullscreen" : "auto",
            lazyType: "none",
            parallax: {
                type: "mouse",
                origo: "slidercenter",
                speed: 9000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50]
            },
            shadow: 0,
            spinner: "off",
            stopLoop: "off",
            shuffle: "off",
            autoHeight: "off",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            disableProgressBar: "off",
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false
            }
        });




        // DOM element where the Timeline will be attached
        var timeline = "";
        $(function() {
            $.ajax({
                type: "GET",
                url: "landing/timeline",
                dataType: 'json',
                success: function(data) {
                    var container = document.getElementById('visualization');
                    // Create a DataSet (allows two way data-binding)
                    var items = new vis.DataSet(data)
                    var options = {

                        margin: {
                            item: 20
                        },
                        zoomable: false,
                        //   start: new Date().getFullYear() - 10,
                        showMajorLabels: false,
                        zoomMax: 315360000000, // 10 years in milliseconds
                        format: {
                            minorLabels: {
                                year: 'YYYY'
                            },
                        },
                        timeAxis: {
                            scale: 'year',
                            step: 1
                        }
                    };
                    // Create a Timeline
                    timeline = new vis.Timeline(container, items, options);
                    timeline.on('select', showPost);
                }
            });
        });

        function showPost(content) {
            var id = content.items[0];
            // revapi.revnext()
            revapi.revshowslide(id);
        }

        // Get the dropdown element
        const dropdown = document.getElementById('dateDropdown');

        // Add an event listener to the dropdown
        dropdown.addEventListener('change', () => {

            // Get the selected date from the dropdown
            const selectedDate = new Date(dropdown.value);

            // Calculate the range you want to display around the selected date
            const range = {
                start: new Date(selectedDate.getTime() - 24 * 60 * 60 * 1000), // 1 day before the selected date
                end: new Date(selectedDate.getTime() + 24 * 60 * 60 * 1000 *
                    365), // 1 day after the selected date
            };

            // Set the visible window of the timeline to the specified range
            console.log(timeline)
            timeline.setWindow(range.start, range.end);
        });
    </script>

    <style>
        p.x-sign img {
            width: 500px !important;
        }
    </style>

    {{-- <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="gallery-modal" aria-hidden="true"> --}}
    {{--    <div class="modal-dialog modal-fullscreen"> --}}
    {{--        <div class="modal-content"> --}}
    {{--            <div class="modal-header"> --}}
    {{--                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i> </button> --}}
    {{--            </div> --}}
    {{--            <div class="modal-body"> --}}
    {{--                <div class="container"> --}}
    {{--                    <div class="row "> --}}
    {{--                        <div class="col-lg-12 "> --}}
    {{--                            <div class="gallery-modal-content"> --}}
    {{--                                <h2 class="modal-title text-light mb-3" >Gallery</h2> --}}

    {{--                                <div class="news-card-area"> --}}
    {{--                                    <div class="row"> --}}
    {{--                                        @foreach ($gallery as $item) --}}
    {{--                                            <div class="col-lg-4"> --}}
    {{--                                                <div class="news-image-wrapper"> --}}
    {{--                                                    <img src="/gallery/show/{{ $item->post_guid }}" alt=""> --}}
    {{--                                                </div> --}}
    {{--                                            </div> --}}
    {{--                                        @endforeach --}}

    {{--                                    </div> --}}
    {{--                                </div> --}}

    {{--                                <div class="news-card-area"> --}}
    {{--                                    <div class="row"> --}}
    {{--                                        @foreach ($videos as $item) --}}
    {{--                                            <div class="col-lg-4"> --}}
    {{--                                                <div class="news-image-wrapper"> --}}
    {{--                                                    <iframe width="100%" height="240" loading="lazy" --}}
    {{--                                                            src="https://www.youtube.com/embed/{{ $item->url }}" --}}
    {{--                                                            frameborder="0" --}}
    {{--                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" --}}
    {{--                                                            allowfullscreen></iframe> --}}
    {{--                                                </div> --}}
    {{--                                            </div> --}}
    {{--                                        @endforeach --}}

    {{--                                    </div> --}}
    {{--                                </div> --}}

    {{--                            </div> --}}


    {{--                        </div> --}}

    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    {{-- </div> --}}

</body>

</html>
