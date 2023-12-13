<?php

namespace App\Http\Controllers\Front;

use App\Models\Term;
use App\Models\Weeks;
use Hashids\Hashids;
use App\Helpers\Posts;
use App\Helpers\Languages;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Helpers\{Settings, Socialmedias};
use Illuminate\Contracts\Foundation\Application;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Carbon\Carbon;

class WeekController extends Controller
{
    /**
     * @param Term $term
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke($week)
    {
        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);
        $dated = Weeks::where(["week"=>$week])->first();
        $start = $dated->start_date;
        $end = $dated->end_date;
        $paginate_posts = Posts::query()->whereMonth('created_at', date('m', strtotime($dated)))->whereDay('created_at', date('d', strtotime($dated)))->orderBy("created_at", "ASC")->paginate(10);

        $hashids = new Hashids();
        $image = (Settings::key('og_image')) ? route('ogi.display', Settings::key('og_image')) :
            asset('img/cover.png');

        $latestNews = Posts::query()->latest()->limit(4)->get();
        return view(Settings::active_theme('page/week'), compact(
             'start','end','week','paginate_posts', 'hashids', 'latestNews'
        ));
    }
}
