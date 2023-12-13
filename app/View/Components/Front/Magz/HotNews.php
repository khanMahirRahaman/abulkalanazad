<?php

namespace App\View\Components\Front\Magz;

use App\Services\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HotNews extends Component
{
    public $hotNews;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticleService $article)
    {
        $this->hotNews = $article->currentLanguage()->orderBy('post_hits', 'DESC')->limit(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.front.magz.hot-news');
    }
}
