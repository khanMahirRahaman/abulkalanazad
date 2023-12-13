<?php

namespace App\View\Components\Front\Magz\Header;

use App\Helpers\Localization;
use App\Services\LanguageService;
use App\Services\MenuService;
use App\Services\SettingService;

use Illuminate\View\Component;

class MenuHeader extends Component
{
    public $logoWebsite;
    public $menuHeader;
    public $displayLanguage;
    public $activeCount;
    public $showDropdown;
    public $currentLocale;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SettingService $setting, MenuService $menu, LanguageService $language)
    {
        $this->logoWebsite     = $setting->key('logo_web_dark');
        $this->menuHeader      = $menu->getMenuHeader();
        $this->displayLanguage = $setting->key('display_language');
        $this->activeCount     = $language->activeCount();
        $this->showDropdown    = $language->showDropdown();
        $this->currentLocale   = Localization::getCurrentLocale();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.magz.header.menu-header');
    }
}
