/* ===================================
    About
====================================== */

/*---------------------------------------------------------------------
    Theme Name: Trax
    Theme URI:
    Author: Themes Industry
    Author URI:
    Description: One Page , Multi Parallax Template
    Tags: one page, multi page, multipurpose, parallax, creative, html5

 ----------------------------------------------------------------------*/

//PAGE LOADER
$(window).on("load", function () {
    "use strict";
    $(".loader").fadeOut(800);
    $('.side-menu').removeClass('opacity-0');

});


jQuery($=> {
    "use strict";
    let $window = $(window);
    let body = $("body");
    let $root = $("html, body");
    $('[data-toggle="tooltip"]').tooltip();



    /* ----- Back to Top ----- */
    $(body).append('<a href="#" class="back-top"><i class="fa fa-angle-up"></i></a>');
    let amountScrolled = 700;
    let backBtn = $("a.back-top");
    $window.on("scroll", function () {
        if ($window.scrollTop() > amountScrolled) {
            backBtn.addClass("back-top-visible");
        } else {
            backBtn.removeClass("back-top-visible");
        }
    });
    backBtn.on("click", function () {
        $root.animate({
            scrollTop: 0
        }, 100);
        return false;
    });

    /* ------- Smooth scroll ------- */
    $("a.pagescroll").on("click", function (event) {
        event.preventDefault();
        let action = $(this.hash).offset().top;
        if($(this).hasClass('scrollupto')){
            action-=45;
        }
        $("html,body").animate({
            scrollTop: action
        }, 100);
       // $(".navbar-nav li a").removeClass("active");
       // $(this).addClass('active');

    });

    /* ------- navbar menu Position dynamically ------- */
    $(".dropdown").on("mouseenter", function () {
        let $elem = $(this).find('.dropdown-menu'),
            left = $elem.offset().left,
            width = $elem.width(),
            docW = $(window).width();

        if ((left + width) > docW) {
            $elem.addClass("right-show");
        } else if ((left + (width * 2)) < docW) {
            $elem.removeClass("right-show");
        }
    });

    /*------ Sticky MENU Fixed ------*/
    let headerHeight = $("header").outerHeight();
    let navbar = $("nav.navbar");
    if (navbar.not('.fixed-bottom').hasClass("static-nav")) {
        $window.scroll(function () {
            let $scroll = $window.scrollTop();
            let $navbar = $(".static-nav");
            let nextSection = $(".section-nav-smooth");
            if ($scroll > 250) {
                $navbar.addClass("fixedmenu");
                nextSection.css("margin-top", headerHeight);
            } else {
                $navbar.removeClass("fixedmenu");
                nextSection.css("margin-top", 0);
            }
            if ($scroll > 125) {
                $('.header-with-topbar nav').addClass('mt-0');
            } else {
                $('.header-with-topbar nav').removeClass('mt-0');
            }
        });
        $(function () {
            if ($window.scrollTop() >= $(window).height()) {
                $(".static-nav").addClass('fixedmenu');
            }
        })
    }
    if (navbar.hasClass("fixed-bottom")) {
        let navTopMargin = $(".fixed-bottom").offset().top;
        let scrollTop = $window.scrollTop();
        $(window).scroll(function () {
            if ($(window).scrollTop() > navTopMargin) {
                $('.fixed-bottom').addClass('fixedmenu');
            } else {
                $('.fixed-bottom').removeClass('fixedmenu');
            }
            if ($(window).scrollTop() < 260) {
                $('.fixed-bottom').addClass('menu-top');
            } else {
                $('.fixed-bottom').removeClass('menu-top');
            }
        });
        $(function () {
            if (scrollTop < 230) {
                $('.fixed-bottom').addClass('menu-top');
            } else {
                $('.fixed-bottom').removeClass('menu-top');
            }
            if (scrollTop >= $(window).height()) {
                $('.fixed-bottom').addClass('fixedmenu');
            }
        })
    }
    /*Menu Onclick*/
    let sideMenuToggle = $("#sidemenu_toggle");
    let sideMenu = $(".side-menu");
    if (sideMenuToggle.length) {
        sideMenuToggle.on("click", function () {
            $("body").addClass("overflow-hidden");
            sideMenu.addClass("side-menu-active");
            $(function () {
                setTimeout(function () {
                    $("#close_side_menu").fadeIn(300);
                }, 300);
            });
        });
        $("#close_side_menu , #btn_sideNavClose , .side-nav .nav-link.pagescroll").on("click", function () {
            $("body").removeClass("overflow-hidden");
            sideMenu.removeClass("side-menu-active");
            $("#close_side_menu").fadeOut(200);
            $(() => {
                setTimeout(() => {
                    $('.sideNavPages').removeClass('show');
                    $('.fas').removeClass('rotate-180');
                }, 400);
            });
        });
        $(document).keyup(e => {
            if (e.keyCode === 27) { // escape key maps to keycode `27`
                if (sideMenu.hasClass("side-menu-active")) {
                    $("body").removeClass("overflow-hidden");
                    sideMenu.removeClass("side-menu-active");
                    $("#close_side_menu").fadeOut(200);
                    $tooltip.tooltipster('close');
                    $(() => {
                        setTimeout(()=> {
                            $('.sideNavPages').removeClass('show');
                            $('.fas').removeClass('rotate-180');
                        }, 400);
                    });
                }
            }
        });
    }

    /*
     * Side menu collapse opener
     * */
    $(".collapsePagesSideMenu").on('click', function () {
        $(this).children().toggleClass("rotate-180");
    });


    /* ----- Full Screen ----- */
    let resizebanner = ()=> {
        let $fullscreen = $(".full-screen");
        $fullscreen.css("height", $window.height());
        $fullscreen.css("width", $window.width());
    }
    resizebanner();
    $window.resize(function () {
        resizebanner();
    });

    $('.progress').each(function () {
        $(this).appear(function () {
            $(this).animate({
                opacity: 1,
                left: "0px"
            }, 500);
            let b = jQuery(this).find(".progress-bar").attr("data-value");
            $(this).find(".progress-bar").animate({
                width: b + "%"
            }, 500);
        });
    });

    /*----- shop detail Tabs init -----*/
    $(function () {
        initTabsToAccordion();
    });

    function initTabsToAccordion() {
        var animSpeed = 500;
        var win = $(window);
        var isAccordionMode = true;
        var tabWrap = $(".tab-to-accordion");
        var tabContainer = tabWrap.find(".tab-container");
        var tabItem = tabContainer.children("div[id]");
        var tabsetList = tabWrap.find(".tabset-list");
        var tabsetLi = tabsetList.find("li");
        var tabsetItem = tabsetList.find("a");
        var activeId = tabsetList
            .find(".active")
            .children()
            .attr("href");
        cloneTabsToAccordion();
        accordionMode();
        tabsToggle();
        hashToggle();
        win.on("resize orientationchange", accordionMode);

        function cloneTabsToAccordion() {
            $(tabsetItem).each(function () {
                var $this = $(this);
                var activeClass = $this.parent().hasClass("active");
                var listItem = $this.attr("href");
                var listTab = $(listItem);
                if (activeClass) {
                    var activeClassId = listItem;
                    listTab.show();
                }
                var itemContent = $this.clone();
                var itemTab = $this.attr("href");
                if (activeClassId) {
                    itemContent
                        .insertBefore(itemTab)
                        .wrap('<div class="accordion-item active"></div>');
                } else {
                    itemContent
                        .insertBefore(itemTab)
                        .wrap('<div class="accordion-item"></div>');
                }
            });
        }

        function accordionMode() {
            var liWidth = Math.round(tabsetLi.outerWidth());
            var liCount = tabsetLi.length;
            var allLiWidth = liWidth * liCount;
            var tabsetListWidth = tabsetList.outerWidth();
            if (tabsetListWidth <= allLiWidth) {
                isAccordionMode = true;
                tabWrap.addClass("accordion-mod");
            } else {
                isAccordionMode = false;
                tabWrap.removeClass("accordion-mod");
            }
        }

        function tabsToggle() {
            tabItem.hide();
            $(activeId).show();
            $(tabWrap).on("click", 'a[href^="#tab"]', function (e) {
                e.preventDefault();
                var $this = $(this);
                var activeId = $this.attr("href");
                var activeTabSlide = $(activeId);
                var activeOpener = tabWrap.find('a[href="' + activeId + '"]');
                $('a[href^="#tab"]')
                    .parent()
                    .removeClass("active");
                activeOpener.parent().addClass("active");
                if (isAccordionMode) {
                    tabItem.stop().slideUp(animSpeed);
                    activeTabSlide.stop().slideDown(animSpeed);
                } else {
                    tabItem.hide();
                    activeTabSlide.show();
                }
            });
        }

        function hashToggle() {
            var hash = location.hash;
            var activeId = hash;
            var activeTabSlide = $(activeId);
            var activeOpener = tabWrap.find('a[href="' + activeId + '"]');
            if ($(hash).length > 0) {
                $('a[href^="#tab"]')
                    .parent()
                    .removeClass("active");
                activeOpener.parent().addClass("active");
                tabItem.hide();
                activeTabSlide.show();
                win
                    .scrollTop(activeTabSlide.offset().top)
                    .scrollLeft(activeTabSlide.offset().left);
            }
        }
    }


    if ($(window).width() > 992) {

        $(".parallax").parallaxie({
            //speed value btw (-1 to 1)
            speed: 0.55,
            offset: 0,
        });
        $(".parallax.parallax-slow").parallaxie({
            speed: 0.31,
        });
    } else if ($(window).width() < 576) {
        $('#pagepiling #submit_btn').on('click', function () {
            $('#pagepiling #result').remove();
        });
        $('#pagepiling .para-opacity').addClass('opacity-5');
    } else {
        $('#pagepiling .para-opacity').removeClass('opacity-5');
    }
    $(window).resize(function () {
        if ($(window).width() < 576) {
            $('#pagepiling .para-opacity').addClass('opacity-5');
        } else {
            $('#pagepiling .para-opacity').removeClass('opacity-5');
        }
    });

});

