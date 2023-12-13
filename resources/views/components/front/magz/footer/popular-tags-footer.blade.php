<h1 class="block-title">{{ __('theme_magz.popular_tags') }} <div class="right"></div>
</h1>
<div class="block-body">
    <ul class="tags">
        @foreach ($popularTags as $tag)
            <li><a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
</div>