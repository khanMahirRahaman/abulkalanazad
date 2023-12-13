<h1 class="aside-title">{{ __('theme_magz.recent_post') }}</h1>
<div class="aside-body">
    @foreach ($recentPosts as $post)
        @if($loop->first)
            <article class="article-fw">
                <div class="inner">
                    <figure>
                        <a href="{{ Settings::linkPost($post) }}">
                            <img src="{{ asset('/images/'.$post->post_image) }}" alt="{{ $post->post_image }}">
                        </a>
                    </figure>
                    <div class="details">
                        <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></h1>
                        {!! \Str::limit(strip_tags($post->post_content), 100) !!}
                        <div class="detail">
                            <div class="time">{{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}</div>
                            @if($post->terms()->category()->first())
                                <div class="category">
                                    <a href="{{ route('category.show', $post->terms()->category()->first()->slug) }}">
                                        {{ $post->terms()->category()->first()->name }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
            <div class="line"></div>
        @else
            <article class="article-mini">
                <div class="inner">
                    <figure>
                        <a href="{{ Settings::linkPost($post) }}">
                            <img src="{{ asset('/images/'.$post->post_image) }}" alt="{{ $post->post_image }}">
                        </a>
                    </figure>
                    <div class="padding">
                        <h1>
                            <a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a>
                        </h1>
                        <div class="detail">
                            @if($post->terms()->category()->first())
                                <div class="category">
                                    <a href="{{ route('category.show', $post->terms()->category()->first()->slug) }}">
                                        {{ $post->terms()->category()->first()->name }}
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
