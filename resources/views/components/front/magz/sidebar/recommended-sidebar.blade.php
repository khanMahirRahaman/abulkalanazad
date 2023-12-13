<aside>
    <h1 class="aside-title">{{ __('theme_magz.recommended') }}</h1>
    <div class="aside-body">
        @foreach ($recommended as $post )
            @if( $loop->first )
                <article class="article-fw">
                    <div class="inner">
                        <figure>
                            <a href="{{ Settings::linkPost($post) }}">
                                <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}" alt="{{ $post->post_image }}">
                            </a>
                        </figure>
                        <div class="details">
                            <div class="detail">
                                <div class="time">{{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}</div>
                                @if($post->terms->first())
                                    <div class="category">
                                        <a href="{{ route('category.show', $post->terms->first()->slug) }}">
                                            {{ $post->terms->first()->name }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a>
                            </h1>
                            {{ \Str::limit(strip_tags($post->post_content), 100) }}
                        </div>
                    </div>
                </article>
                <div class="line"></div>
            @else
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
            @endif
        @endforeach
    </div>
</aside>
