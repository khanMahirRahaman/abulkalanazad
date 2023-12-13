<?php

namespace App\View\Components\Front\Magz\Sidebar;

use App\Services\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentPostSidebar extends Component
{
    public $recentPosts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticleService $article)
    {
        $this->recentPosts = $article->currentLanguage()->latest()->limit(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.front.magz.sidebar.recent-post-sidebar');
    }
}
