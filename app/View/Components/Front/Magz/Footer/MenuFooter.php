<?php

namespace App\View\Components\Front\Magz\Footer;

use App\Services\MenuService;
use Illuminate\View\Component;

class MenuFooter extends Component
{
    public $menuFooter;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(MenuService $menu)
    {
        $this->menuFooter = $menu->getMenuFooter();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.magz.footer.menu-footer');
    }
}
