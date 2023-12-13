<script src="{{ asset('themes/magz/js/jquery.js') }}"></script>
<script src="{{ asset('themes/magz/js/jquery.migrate.js') }}"></script>
<script src="{{ asset('themes/magz/scripts/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>



<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const current_date = new Date().toISOString().slice(0, 19).replace('T', ' ');
         calenderFunc(current_date);
     //   loadVideos();
     //    $('.owl-carousel').owlCarousel({
     //        lazyLoad: true,
     //        margin: 10,
     //        loop: true,
     //        autoplay: true,
     //        touchDrag: true,
     //        mouseDrag: true,
     //        responsive: {
     //            0: {
     //                items: 1
     //            },
     //            600: {
     //                items: 2
     //            },
     //            1000: {
     //                items: 4
     //            }
     //        }
     //    });
    });
    let $target_end = $(".best-of-the-week");
</script>
{{--<script src="{{ asset('themes/magz/scripts/owlcarousel/dist/owl.carousel.min.js') }}"></script>--}}
<script src="{{ asset('themes/magz/js/e-magz.js') }}"></script>
<script src="{{ asset('js/share.js') }}"></script>

<script>
    $(document).ready(function() {

        if ($("header.primary").length) {
            $("section").eq(0).addClass("first");
            // $("section.first").css({
            //     paddingTop: $("header.primary").outerHeight() + 15
            // })
        }
        $(window).on("resize", function() {
            // if ($("header.primary").length) {
            //     $("section.first").css({
            //         paddingTop: $("header.primary").outerHeight() + 15
            //     })
            // }
        });
    });
</script>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2XR4K2V8PV"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2XR4K2V8PV');
</script>
