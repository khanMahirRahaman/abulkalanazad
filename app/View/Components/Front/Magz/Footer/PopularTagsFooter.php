<?php

namespace App\View\Components\Front\Magz\Footer;

use App\Services\TermService;
use Illuminate\View\Component;

class PopularTagsFooter extends Component
{
    public $popularTags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(TermService $term)
    {
        $this->popularTags = $term->getTag()->currentLanguage()->whereHas('posts')->withCount('posts')->orderBy('posts_count', 'desc')->limit(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.magz.footer.popular-tags-footer');
    }
}
