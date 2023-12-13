<h1 class="title-col">
    {{ __('theme_magz.hot_news') }}
    <div class="carousel-nav" id="hot-news-nav">
        <div class="prev">
            <i class="ion-ios-arrow-left"></i>
        </div>
        <div class="next">
            <i class="ion-ios-arrow-right"></i>
        </div>
    </div>
</h1>
<div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
    @foreach( $hotNews as $post )
        <article class="article-mini">
            <div class="inner">
                <figure>
                    <a href="{{ Settings::linkPost($post) }}">
                        <img src="{{ asset('/images/'. $post->post_image) }}"
                             alt="{{ $post->post_image }}">
                    </a>
                </figure>
                <div class="padding">
                    <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></h1>
                    <div class="detail">
                        @if($post->terms->first())
                            <div class="category">
                                <a href="{{ route('category.show', $post->terms->first()->slug) }}">
                                    {{ $post->terms->first()->name }}
                                </a>
                            </div>
                        @endif
                        <div class="time">{{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL')}}</div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</div>
