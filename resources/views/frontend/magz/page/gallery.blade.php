@extends('frontend.magz.index')

@section('content')
    <div class="container-md">
        <section class="single first">
            <div class="row">
                <div class=" col-lg-12 col-md-12 col-sm-12 col ">
                    <div class="d-flex section-title">
                        <div class="mr-auto p-2">
                            <a href="#">
                                <div class="flexbox-2">
                                    <b>আলোকচিত্র</b>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="album">
                        <div class="row">
                            @foreach (App\Models\Gallery::where(['post_type' => 'gallery'])->get() as $key => $photos)
                                <div class="col-lg-3 col-md-3 col-sm-12 p-2 pic">
                                    <img src="/gallery/show/{{ $photos->post_guid }}"
                                        onclick="openModal();
                                        currentSlide({{ $key + 1 }})"
                                        class="hover-shadow cursor" style="width: 100%">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="myModal" class="modal">
                        <div class="modal-body">
                            <span class="close-btn" onclick="togglePopup()">&times;</span>


                            @foreach (App\Models\Gallery::where(['post_type' => 'gallery'])->get() as $photos)
                                <div class="mySlides">
                                    <img src="/gallery/show/{{ $photos->post_guid }}">
                                </div>
                            @endforeach
                            <a class="previous-page" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next-page" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                    </div>
                </div>

                <div class="row p-4">
                    <div class="col-lg-12 text-center">
                        {{ $paginate_posts->links('frontend.magz.inc._pagination') }}
                    </div>
                </div>
        </section>
        @include('frontend.magz.template-parts.latest-news')
    </div>
@endsection



<script>
    function togglePopup() {
        document.getElementById("myModal").style.display = "none";

    }

    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }




    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
