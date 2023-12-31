<div class="banner">
    @if (Ads::type('home-horizontal') == 'image')
        @if (Ads::checkFileAd('home-horizontal'))
            <a href="{{ Ads::url('home-horizontal') }}" target="_blank">
                <img src="{{ Ads::image('home-horizontal') }}">
            </a>
        @else
            <a href="#" target="_blank">
                <img src="{{ asset('themes/magz/images/ads.png') }}">
            </a>
        @endif
    @elseif (Ads::type('home-horizontal') == 'ga')
        @include('frontend.magz.template-parts.google_adsense', ['ga' => Ads::dataGa('home-horizontal')]))
    @elseif (Ads::type('home-horizontal') == 'script_code')
        @if (File::exists(storage_path('app/public').'/ad/' . Ads::checkFileScript('home-horizontal')))
            @include('ad::' . Ads::viewFileScript('home-horizontal'))
        @endif
    @else
        <a href="#" target="_blank">
            <img src="{{ asset('themes/magz/images/ads.png') }}">
        </a>
    @endif
</div>
