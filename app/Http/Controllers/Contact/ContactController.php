<?php

namespace App\Http\Controllers\Contact;

use App\Models\Term;
use App\Helpers\Posts;
use App\Helpers\Settings;
use Illuminate\View\View;
use App\Helpers\Socialmedias;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Contracts\Foundation\Application;
use App\Models\{Contact, Language, Post, Setting, Socialmedia, TermTaxonomy};

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $image = Settings::key('og_image') ? route('ogi.display', Settings::key('og_image')) :
                    asset('img/cover.png');

        $title = __('theme_magz.contacts_page');

        $twitter = Socialmedias::twitter() ?: Settings::key('site_name');

        SEOTools::setTitle($title);
        SEOTools::setDescription($title);
        SEOTools::metatags()->setKeywords($title);
        SEOTools::setCanonical(url("/contact"));

        SEOTools::opengraph()->setUrl(url("/contact"));
        SEOTools::opengraph()->setSiteName(Settings::key('company_name'));
        SEOTools::opengraph()->addImage($image);

        SEOTools::twitter()->setType('summary_large_image');
        SEOTools::twitter()->setSite('@' . $twitter);
        SEOTools::twitter()->setTitle($title);
        SEOTools::twitter()->setDescription($title);
        SEOTools::twitter()->setImage($image);

        SEOTools::jsonLd()->setTitle($title);
        SEOTools::jsonLd()->setDescription($title);
        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setUrl(url("/contact"));
        SEOTools::jsonLd()->addImage($image);

        $getPosts = Post::article();
        $recentPosts = $getPosts->latest();

        if ($recentPosts->first() === null) {
            $last_recentPost = '';
        }else{
            $last_recentPost = $recentPosts->first()->post_title;
        }

        $queryLanguage = Language::query();
        $language_count = $queryLanguage->count();
        $languages = $queryLanguage->active()->pluck('language', 'language_code');

        $tag_count = Term::tag()->whereHas('posts')->withCount('posts')->orderBy('posts_count', 'desc')->get();

        $latestNews = Posts::query()->latest();

        return view(Settings::active_theme('page/contact'), compact(
            'language_count',
            'languages',
            'latestNews'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email',
            'subject' => 'nullable',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $save = Contact::create($data);

        if ($save) {
            return response()->json([
                'status' => true,
                'data' => __('notification.message_has_been_sent')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => __('notification.message_could_not_be_sent')
            ]);
        }
    }
}
