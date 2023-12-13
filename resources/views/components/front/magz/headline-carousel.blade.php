<div class="headline">
    <div class="nav" id="headline-nav">
        <a class="left carousel-control carousel-control-prev" role="button" data-slide="prev">
            <span class="ion-ios-arrow-left" aria-hidden="true"></span>
            <span class="sr-only">{{ __('theme_magz.previous') }}</span>
        </a>
        <a class="right carousel-control carousel-control-next" role="button" data-slide="next">
            <span class="ion-ios-arrow-right" aria-hidden="true"></span>
            <span class="sr-only">{{ __('theme_magz.next') }}</span>
        </a>
    </div>
    <div class="owl-carousel owl-theme" id="headline">
        @foreach ($headlineCarousel as $post)
            <div class="item">
                <a href="{{ Settings::linkPost($post) }}">
                    @if($post->terms()->category()->first())
                    <div class="badge">
                        {{ $post->terms()->category()->first()->name }}
                    </div>
                    @endif
                    {{ $post->post_title }}
                </a>
            </div>
        @endforeach
    </div>
</div>