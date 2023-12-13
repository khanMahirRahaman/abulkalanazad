<?php

namespace App\View\Components\Front\Magz;

use App\Services\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class JustAnotherNews extends Component
{
    public $justAnotherNews;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticleService $article)
    {
        $this->justAnotherNews = $article->currentLanguage()->inRandomOrder()->limit(8)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.front.magz.just-another-news');
    }
}
