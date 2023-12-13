<div class="owl-carousel owl-theme slide" id="featured">
    @foreach ($featuredCarousel as $post)
        <div class="item">
            <article class="featured">
                <div class="overlay"></div>
                <figure>
                    <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}" alt="{{ $post->post_image }}">
                </figure>
                <div class="details">
                    @if($post->terms->first())
                        <div class="category">
                            <a href="{{ route('category.show', $post->terms->first()->slug)}}">
                                {{ $post->terms->first()->name }}
                            </a>
                        </div>
                    @endif
                    <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></h1>
                    <div class="time">{{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}</div>
                </div>
            </article>
        </div>
    @endforeach
</div>
