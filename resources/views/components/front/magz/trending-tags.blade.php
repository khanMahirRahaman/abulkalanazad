<h1 class="title-col">{{ __('theme_magz.trending_tags') }}</h1>
<div class="body-col">
    <ol class="tags-list">
        @foreach ($trendingTags as $tag)
            <li><a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ol>
</div>
