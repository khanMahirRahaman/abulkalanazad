<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => true,
    'use_custom_favicon' => false,
    'path_favicon'       => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_auth' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => '',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => 'nav-flat nav-legacy',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => "lg",
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => true,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [
            'type'          => 'darkmode-widget',
            'icon_enabled'  => 'fas fa-moon',
            'icon_disabled' => 'fas fa-sun',
            'topnav_right'  => true,
        ],
        [
            'text' => 'dashboard',
            'url'  => 'admin/dashboard',
            'icon' => 'fas fa-tachometer-alt',
        ],
        ['header'   => 'manage_content', 'can'  => ['read-posts','read-pages']],
        [
            'text'    => 'posts',
            'icon'    => 'fas fa-book',
            'can'     => 'read-posts',
            'submenu' => [
                [
                    'text'   => 'all_posts',
                    'url'    => 'admin/manage/posts',
                    'can'    => 'read-posts',
                    'active' => ['admin/manage/posts', 'admin/manage/posts/*/edit'],
                ],
                [
                    'text'   => 'addnew_post',
                    'can'    => 'add-posts',
                    'url'    => 'admin/manage/posts/create',
                    'active' => ['admin/manage/posts/create/*'],
                ],
                [
                    'text'   => 'categories',
                    'url'    => 'admin/manage/categories',
                    'can'    => 'read-categories',
                    'active' => ['admin/manage/categories', 'admin/manage/categories/*/edit'],
                ],
                [
                    'text'   => 'tags',
                    'url'    => 'admin/manage/tags',
                    'can'    => 'read-tags',
                    'active' => ['admin/manage/tags', 'admin/manage/tags/*/edit'],
                ],
                [
                    'text'   => 'Calendar Event',
                    'url'    => 'admin/calendar-event',
                    'can'    => 'read-posts',
                    'active' => ['admin/calendar-event', 'calendar-event/edit', 'calendar-event/create'],
                ],
                [
                    'text'   => 'Live Links',
                    'url'    => 'admin/live',
                    'can'    => 'read-posts',
                    'active' => ['admin/live', 'live/edit', 'live/create'],
                ]
            ]
        ],
        [
            'text'    => 'pages',
            'icon'    => 'fas fa-copy',
            'can'     => 'read-pages',
            'submenu' => [
                [
                    'text'   => 'all_pages',
                    'url'    => 'admin/manage/pages',
                    'can'    => 'read-pages',
                    'active' => ['admin/manage/pages', 'admin/manage/pages/*/edit'],
                ],
                [
                    'text'   => 'addnew',
                    'url'    => 'admin/manage/pages/create',
                    'can'    => 'add-pages',
                    'active' => ['admin/manage/pages/create/*']
                ]
            ]
        ],
        [
            'text' => 'contacts',
            'url'  => 'admin/manage/contacts',
            'can'  => 'read-contacts',
            'icon' => 'fa fa-envelope',
            'active' => ['admin/manage/contacts/*']
        ],
        ['header' => 'manage_appearance', 'can'  => ['read-menus', 'read-themes']],
        [
            'text' => 'appearance',
            'icon' => 'fas fa-brush',
            'can'  => 'read-menus',
            'submenu'       => [
                [
                    'text'   => 'menu',
                    'url'    => 'admin/manage/menus',
                    'can'    => 'read-menus',
                    'active' => ['admin/manage/menus/*/lang/*']
                ],
                [
                    'text' => 'themes',
                    'can'  => 'read-themes',
                    'url'  => 'admin/manage/themes',
                ],
            ]
        ],
        [
            'text' => 'localization',
            'icon' => 'fas fa-language',
            'can'  => 'read-languages',
            'submenu' => [
                [
                    'text'   => 'languages',
                    'url'    => 'admin/manage/languages',
                    'can'    => 'read-languages',
                    'active' => ['admin/manage/languages/*'],
                ],
                [
                    'text'   => 'translations',
                    'url'    => 'admin/manage/translations',
                    'can'    => 'read-translations',
                    'active' => ['admin/manage/translations/*'],
                ],
            ]
        ],
        [
            'text'    => 'advertisement',
            'icon'    => 'fas fa-bullhorn',
            'can'     => 'read-ads',
            'active'  => ['admin/manage/advertisement', 'admin/manage/advertisement/*/edit'],
            'submenu' => [
                [
                    'text'   => 'placements',
                    'url'    => 'admin/manage/placements',
                    'can'    => 'read-ads',
                    'active' => ['admin/manage/placements', 'admin/manage/placements/*/edit']
                ],
                [
                    'text'   => 'adunit',
                    'url'    => 'admin/manage/advertisement',
                    'can'    => 'read-ads',
                    'active' => ['admin/manage/advertisement', 'admin/manage/advertisement/create', 'admin/manage/advertisement/*/edit'],
                ],
            ]
        ],
        ['header' => 'manage_files', 'can'  => 'read-galleries'],
        [
            'text' => 'media',
            'icon' => 'fas fa-hdd',
            'can'  => 'read-galleries',
            'submenu'     => [
                [
                    'text'   => 'gallery',
                    'url'    => 'admin/manage/galleries',
                    'can'    => 'read-galleries',
                    'active' => ['admin/manage/galleries', 'admin/manage/galleries/*/edit'],
                ],
                [
                    'text' => 'filemanager',
                    'can'  => 'read-file-manager',
                    'url'  => 'admin/manage/filemanager',
                ],
                [
                    'text' => 'slider',
                    'can'  => 'read-galleries',
                    'url'  => 'admin/slider',
                    'active' => ['admin/slider', 'admin/slider/create', 'admin/slider/edit'],
                ],
                [
                    'text' => 'video',
                    'can'  => 'read-galleries',
                    'url'  => 'admin/video',
                    'active' => ['admin/video', 'admin/video/create', 'admin/video/edit'],
                ],
            ]
        ],
        ['header' => 'account_settings', 'can'  => 'read-profile'],
        [
            'text'   => 'profile',
            'icon'   => 'fas fa-fw fa-user',
            'url'    => 'admin/profile',
            'can'    => 'read-profile',
            'active' => ['admin/profile/*'],
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/change-password',
            'can'  => 'read-profile',
            'icon' => 'fas fa-fw fa-lock',
        ],
        ['header' => 'manage_users', 'can'  => ['read-users', 'read-roles', 'read-permissions']],
        [
            'text' => 'users',
            'icon' => 'fas fa-users',
            'can'  => 'read-users',
            'submenu'     => [
                [
                    'text'   => 'all_users',
                    'url'    => 'admin/manage/users',
                    'can'    => 'read-users',
                    'active' => ['admin/manage/users', 'admin/manage/users/*/edit'],
                ],
                [
                    'text' => 'addnew_user',
                    'can'  => 'add-users',
                    'url'  => 'admin/manage/users/create',
                ],
                [
                    'text'   => 'roles',
                    'url'    => 'admin/manage/roles',
                    'can'    => 'read-roles',
                    'active' => ['admin/manage/roles', 'admin/manage/roles/*', 'admin/manage/roles/*/edit']
                ],
            ]
        ],
        [
            'text' => 'socialmedia',
            'url'  => 'admin/manage/socialmedia',
            'can'  => 'read-social-media',
            'icon' => 'fa fa-globe',
        ],
        ['header' => 'manage_settings', 'can'  => 'read-settings'],
        [
            'text' => 'settings',
            'url'  => 'admin/manage/settings',
            'can'  => 'read-settings',
            'icon' => 'fas fa-cogs',
        ],
        [
            'text' => 'env_editor',
            'url'  => 'admin/manage/env-editor',
            'can'  => 'read-env',
            'icon' => 'far fa-file',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
