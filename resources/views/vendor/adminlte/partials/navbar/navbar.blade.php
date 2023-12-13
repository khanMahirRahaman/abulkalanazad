<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ Appearance::makeNavClasses() }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        <li class="nav-item">
            <a class="nav-link " href="/" target="_blank">
                <i class="fas fa-desktop "></i>
                <span class="d-none d-sm-inline">{{ __('menu.visit_site') }}</span>
            </a>
        </li>

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Navbar language widget --}}

        <li class="nav-item adminlte-language-widget dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <span class="d-none d-sm-inline">{{ Users::language() }}</span>
                <span class="d-blok d-sm-none text-uppercase">{{ Auth::user()->userLanguage->language_code }}</span>
                <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                @foreach(Languages::pluck('language', 'id') as $id => $name)
                    <a href="#" class="dropdown-item setting-language" data-id="{{ $id }}">{{ $name }}</a>
                @endforeach
            </div>
        </li>

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

        {{-- User menu link --}}
        @auth
            @if(config('adminlte.usermenu_enabled'))
                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endauth

        {{-- Right sidebar toggler link --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
    </ul>

</nav>
