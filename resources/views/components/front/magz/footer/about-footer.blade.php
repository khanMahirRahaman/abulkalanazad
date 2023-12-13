<h1 class="block-title">{{ __('theme_magz.company_info') }}</h1>
<div class="block-body">
{{--    <figure class="foot-logo">--}}
{{--        @empty(Settings::key('logo_web_light'))--}}
{{--            <img src="{{ asset('themes/magz/images/logo-light.png') }}" alt="Web Logo">--}}
{{--        @else--}}
{{--            <img src="{{  route('logo.display', Settings::key('logo_web_light')) }}" alt=" Web Logo">--}}
{{--        @endempty--}}
{{--    </figure>--}}
    <p class="brand-description">
        {{ Settings::key('site_description') }}
    </p>
    <a href="{{ route('page.show', 'about') }}" class="btn btn-magz white">{{ __('theme_magz.about_us') }} <i class="ion-ios-arrow-thin-right"></i></a>
</div>
