<?php

namespace App\View\Components\Front\Magz;

use App\Services\TermService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrendingTags extends Component
{
    public $trendingTags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(TermService $term)
    {
        $this->trendingTags = $term->getTag()->currentLanguage()->whereHas('posts')->withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.front.magz.trending-tags');
    }
}
