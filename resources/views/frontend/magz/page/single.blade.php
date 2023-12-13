@extends('frontend.magz.index')
@section('content')
<section class="single">
    <div class="custom-container-sh">
        <div class="row mt-3">
            <div class="col-12">
                <div class="d-flex section-title me-auto">
                    <div class="flexbox-2 d-md-flex justify-content-between ">
                        <article class="article main-article">
                            <header>
                                <span>{{$post->portal_name}}</span>
                                <h1>{{ $post->post_title }}</h1>
                            </header>
                        </article>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <ul class="d-flex p-0">
                    <li>{{ Posts::dateConverter(date('d F Y', strtotime($post->created_at))) }}</li>
{{--                    @if ($post->terms()->category()->first())--}}
{{--                    <li class="mx-2">--}}
{{--                        <a href="{{ route('category.show',$post->terms()->category()->first()->slug) }}">--}}
{{--                            {{ $post->terms()->category()->first()->name }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endif--}}

                </ul>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_email"></a>
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_linkedin"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-9 col-sm-12">
                <article class="article main-article">

                    <div>

                        @if (!empty($post->post_image))
                        <figure>
                            <img class="img-fluid" src="{{ route('image.post', $post->post_image) }}" alt="">
                        </figure>
                        @endif
                        {!! $post->post_content !!}
                    </div>


                    <footer>
                        <div class="col-12">
                            <ul class="tags">
                                @foreach ($tags as $tag)
                                <li><a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </footer>
                </article>
            </div>
            <div class="col-lg-3 col-sm-12">
                @if ($post->pdffile)
                <a class="btn btn-info w-100 text-center" href="{{asset('uploads/pdfs').'/'.$post->pdffile}}" target="_blank">View Attachment</a>
                @endif
                @php $images = \App\Models\PostGallery::where(["post_id"=>$post->id])->get(); @endphp
                @if (count($images)>0)
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <a href="{{ asset('/uploads/postimage/' . $image->image) }}" target="_blank">
                                <img class="d-block w-100" src="{{ asset('/uploads/postimage/' . $image->image) }}" alt="First slide">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @endif
                @php $video = \App\Models\Video::where("post_id","=",$post->id)->first(); @endphp
                @if ($video)
                <div class="videobox">
                    <iframe width="100%" height="250px" src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif

                <div><img class="w-100" src="/popup/body/Image 105.png" alt="">
                </div> <br>
                <div><img class="w-100" src="/popup/body/Image 106.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @include('frontend.magz.template-parts.latest-news')
                </div>
            </div>
        </div>

</section>


@endsection
