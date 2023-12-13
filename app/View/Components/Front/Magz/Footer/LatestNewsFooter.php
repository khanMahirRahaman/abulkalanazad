<?php

namespace App\View\Components\Front\Magz\Footer;

use App\Services\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestNewsFooter extends Component
{
    public $latestNews;

    public function __construct(ArticleService $article)
    {
        $this->latestNews = $article->currentLanguage()->latest()->limit(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.front.magz.footer.latest-news-footer');
    }
}
