<div class="block">
    <div class="block">
        <h1 class="block-title">{{ __('theme_magz.latest_news') }}</h1>
        <div class="block-body">
            @foreach ($latestNews as $post)
                <article class="article-mini">
                    <div class="inner">
                        <figure>
                            <a href="{{ Settings::linkPost($post) }}">
                                <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}" alt="{{ $post->post_image }}">
                            </a>
                        </figure>
                        <div class="padding">
                            <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></h1>
                        </div>
                    </div>
                </article>
            @endforeach
            <div class="d-grid gap-2">
                <a href="{{ route('articles.latest') }}" class="btn btn-magz white btn-block">{{ __('theme_magz.see_all') }} <i class="ion-ios-arrow-thin-right"></i></a>
            </div>
        </div>
    </div>
</div>
