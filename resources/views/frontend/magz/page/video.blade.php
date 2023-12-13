@extends('frontend.magz.index')

@section('content')
    <section class="single">
        <div class="container-lg">
            <div class="row mt-mb-2">
                <div class=" col-lg-12 col-md-12 col-sm-12  p-0">
                    <div class="d-flex section-title justify-content-between">
                        <div class="mr-auto p-2">
                            <a href="">
                                <div class="flexbox-2"><b>ভিডিওচিত্র</b> </div>
                            </a>
                        </div>
                        <div class="p-2"> <a href="#">আরও</a> </div>
                    </div>


                    <div class="row p-2" id="video_slide">
                        @foreach ($videos as $video)
                            <div class="col-lg-3 col-md-3 col-sm-12  p-0 vimg">
                                <img src="https://img.youtube.com/vi/{{ $video->url }}/0.jpg" alt="thumnail"
                                    onclick="playthisvideo('{{ $video->url }}')" style="padding:5%;">
                            </div>
                        @endforeach


                    </div>

                    <div class="row p-2">
                        <div class="col-lg-3 col-md-3 col-sm-12  p-0">

                            <div id="mymodalv" class="modalv">
                                <span class="closev">&times;</span>
                                <div id="player" class="modalv-content">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row p-4">
                        <div class="col-lg-12 text-center">
                            {{ $paginate_posts->links('frontend.magz.inc._pagination') }}
                        </div>
                    </div>
                    @include('frontend.magz.template-parts.latest-news')
                </div>
            </div>
        </div>


        <script>
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');

            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.

            function onYouTubeIframeAPIReady() {

            }

            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                event.target.playVideo();
            }

            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.
            var done = false;

            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.PLAYING && !done) {
                    setTimeout(stopVideo, 6000);
                    done = true;
                }
            }

            function stopVideo() {
                player.stopVideo();
            }

            var player;

            function playthisvideo(vidid) {
                if (player) {
                    player.destroy();
                }
                player = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: vidid,
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }
        </script>
        <script>
            // Get the modalv
            var modalv = document.getElementById("mymodalv");

            // Get the image and insert it inside the modalv - use its "alt" text as a caption
            var img = document.getElementById("video_slide");
            var modalvImg = document.getElementById("player");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modalv.style.display = "block";
                modalvImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closevs the modalv
            var span = document.getElementsByClassName("closev")[0];

            // When the user clicks on <span> (x), closev the modalv
            span.onclick = function() {
                modalv.style.display = "none";
            }
        </script>

        <script src="{{ asset('themes/magz/js/jquery.js') }}"></script>
        <script src="{{ asset('themes/magz/js/jquery.migrate.js') }}"></script>
        <script src="{{ asset('themes/magz/scripts/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/custom-css.css') }}">
    @endsection
