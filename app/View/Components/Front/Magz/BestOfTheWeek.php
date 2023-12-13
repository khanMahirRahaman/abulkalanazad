<?php

namespace App\View\Components\Front\Magz;

use App\Services\ArticleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BestOfTheWeek extends Component
{
    public $bestOfTheWeek;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ArticleService $article)
    {
        $this->bestOfTheWeek = $article->currentLanguage()->whereDate('created_at', '>', \Carbon\Carbon::now()->subWeek())->orderBy('post_hits', 'DESC')->limit(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.front.magz.best-of-the-week');
    }
}
