<div class="block-body no-margin">
    <ul class="footer-nav-horizontal">
        @foreach($menuFooter as $menu)
            <li><a href="{{ $menu['link'] }}">{{ $menu['label'] }}</a></li>
        @endforeach
    </ul>
</div>
