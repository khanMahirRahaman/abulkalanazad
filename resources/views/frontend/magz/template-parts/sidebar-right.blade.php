<div class="sidebar-title for-tablet">{{ __('theme_magz.sidebar') }}</div>
<x-popular-sidebar/>
<aside>
    <div class="aside-body">
        <x-newsletter-sidebar/>
    </div>
</aside>
<x-recommended-sidebar/>
@if (Ads::checkAdPlacementActive('sidebar-right-bottom'))
   <x-ads-sidebar-right-bottom/>
@endif
