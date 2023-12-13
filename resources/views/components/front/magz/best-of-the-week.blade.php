@if(count($bestOfTheWeek))
    <section class="best-of-the-week">
        <div class="container">
            <h1>
                <div class="text">{{ __('theme_magz.best_of_the_week') }}</div>
                <div class="carousel-nav" id="best-of-the-week-nav">
                    <div class="prev">
                        <i class="ion-ios-arrow-left"></i>
                    </div>
                    <div class="next">
                        <i class="ion-ios-arrow-right"></i>
                    </div>
                </div>
            </h1>
            <div class="owl-carousel owl-theme carousel-1">
                @foreach($bestOfTheWeek as $post)
                    <article class="article">
                        <div class="inner">
                            <figure>
                                <a href="{{ Settings::linkPost($post) }}">
                                    <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}" alt="{{ $post->post_image }}" alt="{{ $post->post_image }}">
                                </a>
                            </figure>
                            <div class="padding">
                                <div class="detail">
                                    <div class="time">{{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}</div>
                                    @if($post->terms->first())
                                        <div class="category">
                                            <a href="{{ route('category.show', $post->terms->first()->slug) }}">{{ $post->terms->first()->name }}</a>
                                        </div>
                                    @endif
                                </div>
                                <h2>
                                    <a href="{{ Settings::linkPost($post) }}">{{ \Str::limit($post->post_title, 50) }}</a>
                                </h2>
                                {!! \Str::limit(strip_tags($post->post_content), 100) !!}
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
