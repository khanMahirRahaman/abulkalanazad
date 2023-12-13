<?php

namespace App\Http\Controllers\Front;

use Hashids\Hashids;
use App\Traits\Table;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Post, Term};
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Contracts\Foundation\Application;
use App\Helpers\{Languages, Posts, Settings, Socialmedias};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ArticleController extends Controller
{
    use Table;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $hashids = new Hashids();

        $query = Posts::query();
        $posts = $query->latest()->paginate(8);

        if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
            $attr = ($posts->currentPage() == 1) ? "" : __('theme_magz.page')." " . $posts->currentPage() . " - ";

            SEOTools::setTitle("$attr " . __('theme_magz.latest_news') . " - " . Settings::key('site_name'));
        } else {
            $attr = ($posts->currentPage() == 1) ? "" : " - ".__('theme_magz.page')." " . $posts->currentPage();

            SEOTools::setTitle(Settings::key('site_name') . " - " .__('theme_magz.latest_news') ." $attr");
        }

        $image = Settings::key('og_image') ? route('ogi.display', Settings::key('og_image')) :
            asset('img/cover.png');

        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');

        SEOTools::setDescription(Settings::key('site_description'));
        SEOTools::metatags()->setKeywords(Settings::key('meta_keyword'));
        SEOTools::setCanonical(Settings::key('site_url'));

        SEOTools::opengraph()->setTitle(Settings::key('site_name'));
        SEOTools::opengraph()->setDescription(Settings::key('site_description'));
        SEOTools::opengraph()->setUrl(Settings::key('site_url'));
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);

        SEOTools::twitter()->setType('summary_large_image');
        SEOTools::twitter()->setSite('@' . $twitter);
        SEOTools::twitter()->setTitle(Settings::key('site_name'));
        SEOTools::twitter()->setDescription(Settings::key('site_description'));
        SEOTools::twitter()->setImage($image);

        SEOTools::jsonLd()->setTitle(Settings::key('site_name'));
        SEOTools::jsonLd()->setDescription(Settings::key('site_description'));
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Settings::key('site_url'));
        SEOTools::jsonLd()->addImage($image);

        return view(Settings::active_theme('page/posts'), compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        $post->load('terms');
        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');

        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);

        $value = $post->translations->first()->value;


        if (count(json_decode($value, true)) > 1) {
            $postId = data_get(json_decode($value, true), $getCurrentLocale);
        } else {
            if ($post->post_language == $id) {
                $postId = $post->id;
            } else {
                abort(404);
            }
        }
     //   return $postId;

        $post = Post::with('terms')->find($post->id);

     //   return $post;

        if ($post->post_visibility !="public" || $post->post_status == "draft") {
            if (!Auth::check() || $post->post_author != Auth::id()) {
                return abort(404);
            }
        }

        if ($post->terms()->category()->first()) {
            $term_id = $post->terms->first()->id;
            $query = Term::with('posts')->find($term_id);
            $relatedPosts = $query->posts()->where('post_language', $id)->inRandomOrder()->get();
        } else {
            $relatedPosts = Post::with('terms')->article()->where('post_language', $id)->whereDoesnthave('terms', function ($query) {
                $query->category();
            })->inRandomOrder()->get();
        }

        $countRelatedPost = count($relatedPosts);

        $hits = $post->post_hits += 1;
        $post->update(['post_hits' => $hits]);

        $tags = $post->terms()->where('taxonomy', 'tag')->get();

        preg_match_all('/src="([^"]*)"/', $post->post_content, $result);

        if (!empty($post->post_image)) {
            $image = route('ogi.display', $post->post_image);
        } else {
            if ($result[0]) {
                $image = route('ogi.display', last(explode('/', $result[1][0])));
            } else {
                $image = asset('img/cover.png');
            }
        }

        SEOTools::setTitle($post->post_title);

        if ($post->meta_description) {
            $description = $post->meta_description;
        } else {
            if ($post->post_summary) {
                $description = Str::limit(strip_tags($post->post_summary), 160);
            } else {
                if ($post->post_content) {
                    $description = Str::limit(strip_tags($post->post_content), 160);
                } else {
                    $description = Settings::key('site_description');
                }
            }
        }

        if ($post->meta_keyword) {
            $keyword = $post->meta_keyword;
        } else {
            if ($post->terms()->where('taxonomy', 'tag')->first()) {
                foreach ($tags as $tag) {
                    $tag_array[] = $tag->name;
                }
                $keyword = implode(", ", $tag_array);
            } else {
                $keyword = Settings::key('meta_keyword');
            }
        }

        if ($post->terms()->where('taxonomy', 'tag')->first()) {
            foreach ($tags as $tag) {
                $tag_array[] = $tag->name;
            }
            $meta_tags = implode(", ", $tag_array);
        } else {
            $meta_tags = "";
        }

        SEOTools::setDescription($description);
        SEOTools::metatags()->setKeywords($keyword);
        SEOTools::setCanonical(Settings::linkPost($post));

        OpenGraph::setTitle($post->post_title)
           ->setDescription($description)
           ->setType('article')
           ->setArticle([
               'published_time' => $post->created_at,
               'modified_time'  => $post->updated_at,
               'author'         => $post->user->name,
               'tag'            => $meta_tags
           ]);

        SEOTools::opengraph()->setUrl(Settings::linkPost($post));
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);

        SEOTools::twitter()->setSite('@' . $twitter);
        SEOTools::twitter()->setTitle($post->post_title);
        SEOTools::twitter()->setDescription($description);
        SEOTools::twitter()->setUrl(Settings::linkPost($post));
        SEOTools::twitter()->setImage($image);

        SEOTools::jsonLd()->setTitle($post->post_title);
        SEOTools::jsonLd()->setDescription($description);
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Settings::linkPost($post));
        SEOTools::jsonLd()->addImage($image);

        $latestNews =Posts::query()?Posts::query()->latest()->limit(4)->get():[];

        return view(Settings::active_theme('page/single'), compact(
            'post', 'tags', 'countRelatedPost', 'relatedPosts', 'latestNews'
        ));
    }

    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function showPopular(): \Illuminate\Contracts\View\View|Factory|Application
    {
        $hashids = new Hashids();

        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');

        $query = Posts::query();

        $posts = $query->orderBy('post_hits','DESC')->paginate(8);

        $image = (Settings::key('og_image')) ? route('ogi.display', Settings::key('og_image')) :
            asset('img/cover.png');

        if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
            $attr = ($posts->currentPage() == 1) ? "" : $posts->currentPage() . " " . __('theme_magz.page') . " - ";
            $title = "$attr " . __('theme_magz.all_popular_news') . " - " . Settings::key('site_name');
        } else {
            $attr = ($posts->currentPage() == 1) ? "" : " - ".__('theme_magz.page') . " " . $posts->currentPage();
            $title = Settings::key('site_name') . " - " . __('theme_magz.all_popular_news') . " $attr";
        }

        SEOTools::setTitle($title);
        SEOTools::setDescription(Settings::key('site_description'));
        SEOTools::metatags()->setKeywords(Settings::key('meta_keyword'));
        SEOTools::setCanonical(Settings::key('site_url') . '/news/popular');

        SEOTools::opengraph()->setTitle($title);
        SEOTools::opengraph()->setDescription(Settings::key('site_description'));
        SEOTools::opengraph()->setUrl(Settings::key('site_url') . '/news/popular');
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);

        SEOTools::twitter()->setSite('@' . $twitter);
        SEOTools::twitter()->setTitle($title);
        SEOTools::twitter()->setDescription(Settings::key('site_description'));
        SEOTools::twitter()->setUrl(Settings::key('site_url') . '/news/popular');
        SEOTools::twitter()->setImage($image);

        SEOTools::jsonLd()->setTitle($title);
        SEOTools::jsonLd()->setDescription(Settings::key('site_description'));
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(Settings::key('site_url') . '/news/popular');
        SEOTools::jsonLd()->addImage($image);

        $latestNews = $query->latest()->limit(4)->get();

        return view(Settings::active_theme('page/popular'), compact('posts', 'hashids', 'latestNews'));
    }

    /**
     * @param Request $request
     */
    public function react(Request $request)
    {
        $hashids = new Hashids();
        $hashids = $hashids->decode($request->id);
        $id      = $hashids[0];
        $post    = Post::findOrFail($id);
        $like    = ($request->val == "true") ? $post->like += 1 : $post->like -= 1;
        $post->update(['like' => $like]);
    }
}
