<?php

namespace App\View\Components\Front\Magz\Footer;

use App\Services\SocialmediaService;
use Illuminate\View\Component;

class FollowUsFooter extends Component
{
    public $socialmedias;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SocialmediaService $socialmedia)
    {
        $this->socialmedias = $socialmedia->getSite()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.magz.footer.follow-us-footer');
    }
}
