@if($countRelatedPost > 1)
<div class="line">
    <div>{{ __('theme_magz.you_may_also_like') }}</div>
</div>
@endif
<div class="row">
    @empty($relatedPosts)
    @else
    @foreach($relatedPosts->skip(0)->take(2) as $relpost)
    @if ($post->post_title !== $relpost->post_title)
    <article class="article related col-lg-6 col-md-6 col-sm-12 col">
        <div class="inner">
            <figure>
                <a href="{{ Settings::linkPost($post) }}">
                    <img src="{{ asset('/images/'.$relpost->post_image) }}" alt="{{ $relpost->post_image }}">
                </a>
            </figure>
            <div class="padding">
                <h2><a href="{{ Settings::linkPost($relpost) }}">{{ $relpost->post_title }}</a></h2>
                <div class="detail">
                    @if($post->terms->first())
                    <div class="category">
                        <a href="{{ route('category.show',$post->terms->first()->slug) }}">
                            {{ $post->terms->first()->name }}
                        </a>
                    </div>
                    @endif
                    <div class="time">{{ $relpost->created_at->locale(LaravelLocalization::getCurrentLocale())->isoFormat('LL') }}</div>
                </div>
            </div>
        </div>
    </article>
    @endif
    @endforeach
    @endempty
</div>
