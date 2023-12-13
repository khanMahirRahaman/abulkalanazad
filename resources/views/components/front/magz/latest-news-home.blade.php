<div class="line">
    <div>{{ __('theme_magz.latest_news') }}</div>
</div>
<div class="row">
    @foreach ($latestNews as $post)
        <div class="col-lg-6 col-md-6 col-sm-12 col">
            <article class="article col-lg-12">
                <div class="inner">
                    <figure>
                        <a href="{{ Settings::linkPost($post) }}">
                            <img src="{{ Posts::getImage($post->post_content, $post->post_image) }}"
                                 alt="{{ $post->post_image }}">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                            <div class="time">{{ $post->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}</div>
                            @if($post->terms->first())
                                <div class="category">
                                    <a href="{{ route('category.show', $post->terms->first()->slug) }}">
                                        {{ $post->terms->first()->name }}
                                    </a>
                                </div>
                            @endif
                            <div class="view">{{ $post->post_hits }} {{ __('theme_magz.views') }}</div>
                        </div>
                        <h2><a href="{{ Settings::linkPost($post) }}">{{ $post->post_title }}</a></h2>
                        <p>{!! \Str::limit(strip_tags($post->post_content), 250) !!}</p>
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
        </div>
    @endforeach
</div>
