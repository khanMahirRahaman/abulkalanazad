@if(Ads::checkAdPlacementActive('sidebar-left-top'))
   <x-ads-sidebar-left-top/>
@endif
<aside>
    <img src="{{ asset("/img/hasina_banner.jpg")}}" class="w-100">
</aside>
<aside>
    <x-recent-post-sidebar/>
</aside>
<aside>
    <div class="aside-body">
       <x-newsletter-sidebar/>
    </div>
</aside>
