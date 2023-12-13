<section class="single">
    <div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex section-title">
                    <div class="mr-auto">
                        <a href="#">
                            <div class="flexbox-2">
                                <b>সাম্প্রতিক</b>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($latestNews as $latest)
            <div class="col-lg-3 col-md-4 col-12">
                <a href="/news/{{ $latest->post_name }}">
                    <img class="img-fluid" src="{{ asset('/images/' . $latest->post_image) }}" alt="">
                    <div>
                        <p><b>{{ $latest->post_title }}</b></p>
                    </div>
                </a>

            </div>
            @endforeach

        </div>
    </div>
    <div class="container p-0">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="img-banner">
                    <a href="#"><img src="/popup/bfooter-new.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    </div>


</section>