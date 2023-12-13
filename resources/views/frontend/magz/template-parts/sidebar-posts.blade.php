@if (Ads::checkAdPlacementActive('sidebar-right-top'))
    <x-ads-sidebar-right-top/>
@endif
<aside>
    <img src="{{asset("/img/sk_hasina_banner_2.jpg")}}" class="w-100">
</aside>
<aside>
    <x-recent-post-sidebar/>
</aside>
<aside>
    <div class="aside-body">
        <x-newsletter-sidebar/>
    </div>
</aside>
