<title>শেখ হাসিনা প্রতিদিন</title>
@extends('frontend.magz.index')
@section('content')

<div class="container-fluid sh-banner-section">
    <section class="home">
        <div class="slider">
            @foreach ($sliders as $slider)
            <div>
                <img src="{{ asset('uploads/slider/' . $slider->image) }}" @if (isset($slider->headline))
                title="{{ $slider->headline }}" @endif />
            </div>
            @endforeach
        </div>
        <div class="flex-column flex-md-row d-md-flex justify-content-md-between  mt-3 no-padding">
            <div>
            </div>
            <form action="{{ route('search') }}" method="GET"  autocomplete="off">

            <div class="flex-column flex-md-row d-md-flex justify-content-md-between btn-margin-sm-device">

                <div class="input-group">
                    <div class="form-outline">
                        <input type="text" name="q" class="form-control search sh-banner-bottom-btn-video mx-2 text-light home-below-slider" placeholder="এখানে লিখুন">
                    </div>
                    <button type="submit" class="sh-banner-bottom-btn-submit mx-2 text-light home-below-slider">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
                            <g id="Search" transform="translate(-4867 -3388)">
                                <rect id="Rectangle_201" data-name="Rectangle 201" width="21" height="21" transform="translate(4867 3388)" fill="none"/>
                                <path id="Icon_ionic-md-search" data-name="Icon ionic-md-search" d="M19.458,17.7H18.5l-.359-.3A7.943,7.943,0,0,0,20,12.3a7.748,7.748,0,1,0-7.718,7.8,8.019,8.019,0,0,0,5.085-1.86l.359.3v.96l5.983,6L25.5,23.7Zm-7.18,0a5.4,5.4,0,1,1,5.385-5.4A5.37,5.37,0,0,1,12.278,17.7Z" transform="translate(4862.5 3383.5)" fill="#fff"/>
                            </g>
                        </svg>&nbsp;অনুসন্ধান
                    </button>
                </div>




                <a href="javascript:void(0)" class="sh-banner-bottom-btn-video mx-2 text-light home-below-slider" data-toggle="modal" data-target=".calendar-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
                        <g id="Calender" transform="translate(-4838 -3388)">
                            <rect id="Rectangle_200" data-name="Rectangle 200" width="21" height="21" transform="translate(4838 3388)" fill="none"/>
                            <path id="Icon_awesome-calendar-alt" data-name="Icon awesome-calendar-alt" d="M0,19.031A1.969,1.969,0,0,0,1.969,21H16.406a1.969,1.969,0,0,0,1.969-1.969V7.875H0Zm13.125-8.039a.494.494,0,0,1,.492-.492h1.641a.494.494,0,0,1,.492.492v1.641a.494.494,0,0,1-.492.492H13.617a.494.494,0,0,1-.492-.492Zm0,5.25a.494.494,0,0,1,.492-.492h1.641a.494.494,0,0,1,.492.492v1.641a.494.494,0,0,1-.492.492H13.617a.494.494,0,0,1-.492-.492Zm-5.25-5.25a.494.494,0,0,1,.492-.492h1.641a.494.494,0,0,1,.492.492v1.641a.494.494,0,0,1-.492.492H8.367a.494.494,0,0,1-.492-.492Zm0,5.25a.494.494,0,0,1,.492-.492h1.641a.494.494,0,0,1,.492.492v1.641a.494.494,0,0,1-.492.492H8.367a.494.494,0,0,1-.492-.492Zm-5.25-5.25a.494.494,0,0,1,.492-.492H4.758a.494.494,0,0,1,.492.492v1.641a.494.494,0,0,1-.492.492H3.117a.494.494,0,0,1-.492-.492Zm0,5.25a.494.494,0,0,1,.492-.492H4.758a.494.494,0,0,1,.492.492v1.641a.494.494,0,0,1-.492.492H3.117a.494.494,0,0,1-.492-.492ZM16.406,2.625H14.438V.656A.658.658,0,0,0,13.781,0H12.469a.658.658,0,0,0-.656.656V2.625H6.563V.656A.658.658,0,0,0,5.906,0H4.594a.658.658,0,0,0-.656.656V2.625H1.969A1.969,1.969,0,0,0,0,4.594V6.563H18.375V4.594A1.969,1.969,0,0,0,16.406,2.625Z" transform="translate(4839 3388)" fill="#fff"/>
                        </g>
                    </svg>
                    &nbsp;ক্যালেন্ডার
                </a>

                <div class="modal fade calendar-modal" tabindex="-1" role="dialog"
                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <div id="calenderShow">
                            </div>

                        </div>
                    </div>
            </div>
        </div>
            </form>
        </div>
    </section>
</div>

<div class="custom-container-sh">
    <div class="row">
        <div class="col-lg-12">
            <div class="flex-column flex-md-row d-md-flex justify-content-md-between">
                <div class="d-flex">
                    <div class="section-title-box">
                        <img src="{{ asset('/img/sh-svg/section-icon3.svg ')}}" />


                    </div>
                    <div class="mx-2">
                        <h2 class="mb-0">{{ $categoryTwo->name }}</h2>
                    </div>
                </div>

                <a class="text-success mt-5 mt-md-0" href="/category/news">
                    আরও পড়ুন &gt;&gt;</a>
            </div>
        </div>
    </div>

    <div class="row mt-5 mt-md-2">
        <div class="col-lg-4">
            <div class="news-box">
                <div class="row section-bottom-margin">
                    @for ($i = 1; $i < 4; $i++) @if (isset($get_postTwo[$i]) && !empty($get_postTwo[$i])) <div
                        class="col-lg-5 mb-3"><a href="{{ url('/news/' . $get_postTwo[$i]->post_name) }}">
                            <img src="{{ asset('/images/' . $get_postTwo[$i]->post_image) }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-7 mb-3">
                        <a href="{{ url('/news/' . $get_postTwo[$i]->post_name) }}">
                            <h5 style="font-size: 1.1rem;">{{ $get_postTwo[$i]->post_title }}</h5>
                        </a>

{{--                        <p class="meta-date">--}}
{{--                            {{ Posts::dateConverter(date('d F Y', strtotime($get_postTwo[$i]->created_at))) }}--}}

{{--                        </p>--}}
                    </div>
                    @endif
                    @endfor
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-lg-block d-none">
            <div class="news-box">
                @if (isset($get_postTwo[0]) && !empty($get_postTwo[0]))
                    <a href="{{ url('/news/' . $get_postTwo[0]->post_name) }}">
                        <div>
                            <img src="{{ asset('/images/' . $get_postTwo[0]->post_image) }}">
                        </div>

                        <div class="headers">
                            <h2 style="font-size: 1.6rem;" class="mt-2">{{ $get_postTwo[0]->post_title }}</h2>
                        </div>
{{--                        <div class="texts">--}}
{{--                            <p>{!! Str::limit($get_postTwo[0]->post_summary, 150) !!}--}}
{{--                            </p>--}}
{{--                            <p class="meta-date">--}}
{{--                                {{ Posts::dateConverter(date('d F Y', strtotime($get_postTwo[$i]->created_at))) }}--}}

{{--                            </p>--}}
{{--                        </div>--}}
                    </a>
                @endif
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="news-box">
                <div class="row">
                    @for ($i = 4; $i < 7; $i++) @if (isset($get_postTwo[$i]) && !empty($get_postTwo[$i])) <div
                        class="col-lg-5 mb-3">
                        <a href="{{ url('/news/' . $get_postTwo[$i]->post_name) }}">
                            <img src="{{ asset('/images/' . $get_postTwo[$i]->post_image) }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-7 mb-3">
                        <a href="{{ url('/news/' . $get_postTwo[$i]->post_name) }}">
                            <h5 style="font-size: 1.1rem;">{{ $get_postTwo[$i]->post_title }}</h5>
{{--                            <p class="align-text-bottom mb-0 meta-date">--}}
{{--                                {{ Posts::dateConverter(date('d F Y', strtotime($get_postTwo[$i]->created_at))) }}--}}

{{--                            </p>--}}
                        </a>
                    </div>
                    @endif
                    @endfor
                </div>
            </div>

        </div>
    </div>

</div>


<div class="custom-container-sh mt-5 reveal fade-bottom">
    <div class="row">
        <div class="col-lg-12">
            <div class="flex-column flex-md-row d-md-flex justify-content-md-between">
                <div class="d-flex">
                    <div class="section-title-box">
                        <img src="{{ asset('/img/sh-svg/section-icon1.svg ')}}" />


                    </div>
                    <div class="mx-2">
                        <h2 class="mb-0">সোনার বাংলার রূপকার</h2>
                    </div>
                </div>
                <a class="text-success font-weight-bold mt-5 mt-md-0" href="/category/sonar-banglar-rupokar">
                    আরও পড়ুন &gt;&gt;</a>
            </div>
        </div>
    </div>
    <div class="row mt-5 mt-md-2">
        <div class="col-lg-5 col-sm-12">
            <div class="news-box news-box-shadow">
                @if (isset($get_postOne[0]) && !empty($get_postOne[0]))
                <a href="{{ url('/news/' . $get_postOne[0]->post_name) }}">
                    <img class="image-cover" src="{{ asset('/images/' . $get_postOne[0]->post_image) }}">
                </a>
                @php $categories = \App\Helpers\Posts::getCategories($get_postOne[0]->id);

                @endphp
                @foreach($categories as $category)
                    <div class="category-tag">{{$category->name}}</div>
                    @endforeach
                <div class="para p-3">
                    <div class="headers">
                        <a href="{{ url('/news/' . $get_postOne[0]->post_name) }}">
                            <h3 style="font-size: 1.6rem;" class="mt-2">{{ $get_postOne[0]->post_title }}</h3>
                            <p>{{ $get_postOne[0]->post_summary }}
                            </p>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-7 col-sm-12">
            <div class="row">
                @for ($i = 1; $i < sizeof($get_postOne); $i++) @if (isset($get_postTwo[$i]) && !empty($get_postTwo[$i]))
                    <div class="col-lg-6 mb-2">
                    <a href="{{ url('/news/' . $get_postOne[$i]->post_name) }}">
                        <div class="news-box">
                            <img src="{{ asset('/images/' . $get_postOne[$i]->post_image) }}" alt="">
                            @php $categories = \App\Helpers\Posts::getCategories($get_postOne[$i]->id);

                            @endphp
                            @foreach($categories as $category)
                                <div class="category-tag">{{$category->name}}</div>
                            @endforeach
                            <h5 style="font-size: 1.1rem;" class="profile-details mt-2">
                                {{ $get_postOne[$i]->post_title }}
                            </h5>
                        </div>
                    </a>
            </div>
            @endif
            @endfor
        </div>
    </div>
</div>

</div>



<div class="container-fluid p-0">
    <div class="infografic-area mt-5">
        <div class="custom-container-sh">
            <div class="row">
                <div class="col-lg-5">
                    <div class="infografic-left-img-wrapper  reveal fade-bottom">
                        <img src="{{asset('/img/hasina-infograpic.png')}}" />
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="reveal fade-right">
                        <div class="row">
                            <div class="col-lg-6 p-0">
                                <a href="https://pmo.gov.bd/" target="_blank" class="infografic-right-square">
                                    <div class="infografic-right-square-icon-item">
                                        <div class="infografic-right-square-icon-wrapper">
                                            <img src="{{asset('/img/sh-svg/sh-info-001.svg')}}" />

                                        </div>
                                        <h4 class="text-success mt-3 ">ইনফোগ্রাফিক &nbsp;&nbsp;&nbsp; </h4>
                                    </div>

                                </a>
                            </div>
                            <div class="col-lg-6 p-0">
                                <div type="button" data-toggle="modal" data-target="#news-latter-subscribe"
                                    class="infografic-right-square">
                                    <div class="infografic-right-square-icon-item">
                                        <div class="infografic-right-square-icon-wrapper">
                                            <img src="{{asset('/img/sh-svg/sh-info-002.svg')}}" />

                                        </div>
                                        <div class="text-center">
                                            <h4 class="text-success mt-3 ">নিউজলেটার সাবস্ক্রাইব </h4>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 p-0">
                                <div type="button" data-toggle="modal" data-target="#write-to-pm"
                                    class="infografic-right-square">
                                    <div class="infografic-right-square-icon-item">
                                        <div class="infografic-right-square-icon-wrapper">
                                            <img src="{{asset('/img/sh-svg/sh-info-003.svg')}}" />

                                        </div>
                                        <div class="text-center">
                                            <h4 class="text-success mt-3">প্রধানমন্ত্রীকে লিখুন</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 p-0">

                                <a href="{{ url('/category/books-and-audiobooks') }}" class="infografic-right-square">
                                    <div class="infografic-right-square-icon-item">
                                        <div class="infografic-right-square-icon-wrapper">
                                            <img src="{{asset('/img/sh-svg/sh-info-004.svg')}}" />

                                        </div>
                                        <div class="text-center">
                                            <h4 class="text-success mt-3 ">শেখ হাসিনা ই-বুক </h4>

                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="custom-container-sh mt-5 reveal fade-bottom">
    <div class="row">
        <div class="col-lg-12">
            <div class="flex-column flex-md-row d-md-flex justify-content-md-between">
                <div class="d-flex">
                    <div class="section-title-box">
                        <img src="{{ asset('/img/sh-svg/section-icon2.svg ')}}" />


                    </div>
                    <div class="mx-2">
                        <h2 class="mb-0">{{ $categoryThree->name }}</h2>
                    </div>
                </div>

                <a class="text-success mt-5 mt-md-0" href="/category/news-on-the-day">
                    আরও পড়ুন &gt;&gt;</a>
            </div>
        </div>
    </div>
    <div class="row third-section mt-5 mt-md-2">


        <div class="col-lg-5 col-sm-12">
            <div class="news-box news-box-shadow">
                @if (isset($get_postThree[0]) && !empty($get_postThree[0]))
                <a href="{{ url('/news/' . $get_postThree[0]->post_name) }}">
                    <div>
                        @if ($get_postThree[0]->post_image)
                        <img class="image-cover" src="{{ asset('/images/' . $get_postThree[0]->post_image) }}">
                        @endif
                    </div>
                    <div class="para p-3">

                        <div class="headers ">
                            <h3 style="font-size: 1.6rem;">{{ $get_postThree[0]->post_title }}</h3>
                        </div>

                        <div class="texts">
                            <p class="mb-1">{!! Str::limit($get_postThree[0]->post_summary, 200) !!}</p>
                        </div>
                    </div>

                </a>
                @endif
            </div>
        </div>


        <div class="col-lg-7 col-sm-12">
            <div class="news-box">
                <div class="row ">
                    @for ($i = 1; $i < sizeof($get_postThree); $i++) <div class="col-lg-6">
                        <a href="{{ url('/news/' . $get_postThree[$i]->post_name) }}">
                            <div>
                                @if ($get_postThree[$i]->post_image)
                                <img src="{{ asset('/images/' . $get_postThree[$i]->post_image) }}" alt="">
                                @endif
                                <h5 style="font-size: 1.1rem;" class="mb-2 mt-1">
                                    {{ $get_postThree[$i]->post_title }}
                                </h5>
                            </div>
                        </a>
                </div>
                @endfor

            </div>

        </div>
    </div>
</div>
</div>

<div class="custom-container-sh mt-5 reveal fade-bottom d-none d-md-block">
    <div class="row mt-mb-2">
        <div class="col-12">
            <div class="banner-volunteer">
                <a href="#"><img src="/popup/bfooter-new.png" alt=""></a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="news-latter-subscribe" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">নিউজলেটার সাবস্ক্রাইব</h5>
                <button style="border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-3">
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <div class="d-flex">
                            <div style="margin-right: 15px;" class="infografic-right-square-icon-wrapper">
                                <img src="{{asset('/img/sh-svg/subscribe1.svg')}}" />
                            </div>
                            <div class="mt-3">
                                <h6>Receive timely news updates straight in your inbox.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2 ">
                        <div class="d-flex">
                            <div style="margin-right: 15px;" class="infografic-right-square-icon-wrapper">
                                <img src="{{asset('/img/sh-svg/subscribe2.svg')}}" />
                            </div>
                            <div class="mt-3">
                                <h6>Access a collection of interviews, speeches, latest events, and social media updates
                                    from the PM.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="d-flex">
                            <div style="margin-right: 15px;" class="infografic-right-square-icon-wrapper">
                                <img src="{{asset('/img/sh-svg/subscribe3.svg')}}" />
                            </div>
                            <div class="mt-3">
                                <h6>Receive personalised Birthday Greetings from the PM.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <div class="d-flex">
                            <div style="margin-right: 15px;" class="infografic-right-square-icon-wrapper">
                                <img src="{{asset('/img/sh-svg/subscribe4.svg')}}" />
                            </div>
                            <div class="mt-3">
                                <h6>Receive emails customised
                                    to your interests.</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-3">
                            <form>
                                <div>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <button type="submit" class="btn btn-danger mt-3">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="write-to-pm" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">প্রধানমন্ত্রীকে লিখুন</h5>
                <button style="border: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-3">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-3">
                            <form>
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="exampleInputName"
                                        aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                                <div class="mb-2">
                                    <label for="inputPassword5">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="mb-2">
                                    <label for="message">Message</label>
                                    <textarea style="min-height: 145px;" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>

                                </div>
                                <button type="submit" class="btn btn-success mt-2">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<script>
function calenderFunc(date) {
    $.ajax({
        type: "POST",
        url: "{{ route('front.calender') }}",
        dataType: 'json',
        data: {
            date: date
        },
        success: function(data) {
            $("#calenderShow").empty();
            $("#calenderShow").append(data.calendar);
        }
    });
}
$(function() {
    $('.slider').bxSlider({
        mode: 'fade',
        captions: true,
        controls: true,
        pager: false
    });
});

function calenderFunc(date) {
    $.ajax({
        type: "POST",
        url: "{{ route('front.calender') }}",
        dataType: 'json',
        data: {
            date: date
        },
        success: function(data) {
            $("#calenderShow").empty();
            $("#calenderShow").append(data.calendar);
        }
    });
}

function changeYear(month) {
    var selectedYear = $("#calendarYear").val()
    yeardate = selectedYear + "-" + month + "-01"

    $.ajax({
        type: "POST",
        url: "{{ route('front.calender') }}",
        dataType: 'json',
        data: {
            date: yeardate
        },
        success: function(data) {
            $("#calenderShow").empty();
            $("#calenderShow").append(data.calendar);
        }
    });
}

{{--function loadVideos() {--}}
{{--    var videos = '';--}}
{{--    @foreach($videos as $video)--}}
{{--    videos += '<div class="card bg-transparent" style="height: 240px">' +--}}
{{--        '<div class="item">' +--}}
{{--        '<iframe width="100%" height="240" loading="lazy"' +--}}
{{--        ' src="https://www.youtube.com/embed/{{ $video->url }}"' +--}}
{{--        ' frameborder="0"' +--}}
{{--        '   allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"' +--}}
{{--        ' allowfullscreen></iframe>' +--}}
{{--        ' </div>' +--}}
{{--        '</div>'--}}
{{--    @endforeach--}}

{{--    document.getElementById("video_slide").innerHTML += videos--}}
{{--}--}}


function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

window.addEventListener("scroll", reveal);
</script>
@endsection
{{--<script src="{{ asset('themes/magz/js/jquery.js') }}"></script>--}}
