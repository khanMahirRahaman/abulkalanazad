<div class="line top">
    <div>{{ __('theme_magz.just_another_news') }}</div>
</div>
<div class="row">
    @foreach ($justAnotherNews as $post)
        <article class="col-lg-12 article-list">
            <div class="inner">
                <figure>
                    <a href="{{ Settings::linkPost($post) }}">
                        <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}"
                             alt="{{ $post->post_image }}">
                    </a>
                </figure>
                <div class="details">
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
                    <h1><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></h1>
                    <p>
                        {!! \Str::limit(strip_tags($post->post_content), 100) !!}
                    </p>
                    <footer>
                        <a href="javascript:void(0);" class="love" data-id="{{ $hashids->encode($post->id) }}"><i
                                class="ion-android-favorite-outline"></i>
                            <div>{{ $post->like }}</div>
                        </a>
                        <a class="btn btn-primary more" href="{{ Settings::linkPost($post) }}">
                            <div>{{ __('theme_magz.more') }}</div>
                            <div><i class="ion-ios-arrow-thin-right"></i></div>
                        </a>
                    </footer>
                </div>
            </div>
        </article>
    @endforeach
</div>
