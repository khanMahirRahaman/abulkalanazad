<aside>
    <div class="aside-body">
        <figure class="ads">
            @if (Ads::type('sidebar-left-top') == 'image')
                @if (Ads::checkFileAd('sidebar-left-top'))
                    <a href="{{ Ads::url('sidebar-left-top') }}" target="_blank">
                        <img src="{{ Ads::image('sidebar-left-top') }}">
                    </a>
                    <figcaption>{{ __('theme_magz.advertisement') }}</figcaption>
                @else
                    <a href="#">
                        <img src="{{ asset('themes/magz/images/ad.png') }}">
                    </a>
                    <figcaption>{{ __('theme_magz.advertisement') }}</figcaption>
                @endif
            @elseif (Ads::type('sidebar-left-top') == 'ga')
                @include('frontend.magz.inc._google_adsense', ['ga' => Ads::dataGa('sidebar-left-top')]))
            @elseif (Ads::type('sidebar-left-top') == 'script_code')
                @if (File::exists(storage_path('app/public').'/ad/' . Ads::checkFileScript('sidebar-left-top')))
                    @include('ad::' . Ads::viewFileScript('sidebar-left-top'))
                @endif
            @else
                <a href="#">
                    <img src="{{ asset('themes/magz/images/ad.png') }}">
                </a>
                <figcaption>{{ __('theme_magz.advertisement') }}</figcaption>
            @endif
        </figure>
    </div>
</aside>
