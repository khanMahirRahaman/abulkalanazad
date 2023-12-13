<aside>
    <h1 class="aside-title">{{ __('theme_magz.popular') }} <a href="{{ route('article.popular') }}" class="all">{{ __('theme_magz.see_all') }} <i class="ion-ios-arrow-right"></i></a></h1>
    <div class="aside-body">
        @foreach($popular as $post)
            <article class="article-mini">
                <div class="inner">
                    <figure>
                        <a href="{{ Settings::linkPost($post) }}">
                            <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}" alt="{{ $post->post_image }}">
                        </a>
                    </figure>
                    <div class="padding">
                        <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a>
                        </h1>
                        <div class="detail">
                            @if($post->terms->first())
                                <div class="category">
                                    <a href="{{ route('category.show', $post->terms->first()->slug) }}">
                                        {{ $post->terms->first()->name }}
                                    </a>
                                </div>
                            @endif
                            <div class="time">{{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}</div>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</aside>
