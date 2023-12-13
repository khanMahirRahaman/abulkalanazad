<nav class="menu">

    <div class="mobile-toggle">
        <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
    </div>
    <div class="mobile-toggle">
        <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
    </div>
    <div id="menu-list">
        @php $menus = $menuHeader @endphp
        @if ($menus)
            <ul class="nav-list">
                @foreach ($menus as $menu)
                    <li class="@if ($menu['child']) dropdown magz-dropdown @endif">
                        <a href="{{ $menu['link'] }}" title="">{{ $menu['label'] }} @if ($menu['child'])
                                <i class="ion-ios-arrow-right"></i>
                            @endif
                        </a>
                        @if ($menu['child'])
                            @include('frontend.magz.inc._child', ['childs' => $menu['child']])
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

    </div>
</nav>
