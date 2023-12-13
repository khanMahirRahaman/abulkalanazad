<ul class="footer-copyright list-inline d-inline-block mb-0">
    <li class="list-inline-item">
        <span class="d-none d-sm-inline">{{ __('Copyright') }}</span>
         &copy; {{ \Carbon\Carbon::now()->format('Y') }}
    </li>
    <li class="list-inline-item">
        <a href="{{ Settings::key('site_url') }}">
            <strong>{{ Settings::key('company_name') }}</strong>
        </a>
    </li>
    <li class="list-inline-item">
        <span class="d-none d-sm-inline"> {{ __('All Rights Reserved') }}</span>
    </li>
</ul>


<ul class="list-inline d-inline-block float-right mb-0">
    <li class="list-inline-item d-none d-sm-inline"><strong>Env</strong> {{ App::environment() }}</li>
    <li class="list-inline-item">
        <strong class="d-none d-sm-inline">Version</strong>
        <span class="d-blok d-sm-none">v</span>{{ config('retenvi.version') }}</li>
</ul>
