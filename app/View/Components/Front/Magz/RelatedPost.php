<?php

namespace App\View\Components\Front\Magz;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelatedPost extends Component
{
    public $countRelatedPost;
    public $relatedPosts;
    public $mainPostTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($countRelatedPost, $relatedPosts, $mainPostTitle)
    {
        $this->countRelatedPost = $countRelatedPost;
        $this->relatedPosts = $relatedPosts;
        $this->mainPostTitle = $mainPostTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.front.magz.related-post');
    }
}
