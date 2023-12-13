<h1 class="block-title">{{ __('theme_magz.follow_us') }}</h1>
<div class="block-body">
    <p>{{ __('theme_magz.follow_us_description') }}</p>
    <ul class="social trp">
        @foreach($socialmedias as $socialmedia)
            <li>
                <a href="{{ $socialmedia->site->url }}" style="background-color: {{ Settings::getSocMed($socialmedia->id)->color }}">
                    <svg>
                        <rect width="0" height="0" /></svg>
                    <i class="{{ $socialmedia->icon }}"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>
