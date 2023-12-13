<?php

namespace App\Http\Controllers\Front;

use Hashids\Hashids;
use App\Helpers\Languages;
use App\Helpers\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Helpers\Socialmedias;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Contracts\Foundation\Application;
use App\Models\{Gallery, Post, Term};
use App\Models\{Video};
use App\Models\CalendarEvents;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\Posts;
use Google\Service\CloudVideoIntelligence\Resource\Videos as ResourceVideos;
use Google\Service\YouTube\Resource\Videos;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Term $category)
    {

        $data['sliders'] = DB::table('sliders')->orderBy('id', 'desc')->get();
        $data['social_meadia_links'] = DB::table('socialmedia')->get();

        $data['categoryOne'] = DB::table('terms')->where('id', '=', 93)->first();
        $data['categoryTwo'] = DB::table('terms')->where('id', '=', 1)->first();
        $data['categoryThree'] = DB::table('terms')->where('id', '=', 2)->first();

        $data['videos'] = $data['videos'] = DB::table('videos')
            ->select('id', 'url')
            ->distinct('url') // Specify the column for which you want distinct values
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();

        $getCurrentLocale = LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);
        $term = $category;
        $category->load('posts');

        $description = $category->description ? Str::limit(strip_tags($category->description), 200) : '';

        $category_one_id = $data['categoryOne']->id;
        $category_two_id = $data['categoryTwo']->id;
        $category_three_id = $data['categoryThree']->id;

        $data['get_postOne'] = DB::select("SELECT b.*, c.slug, c.name FROM `post_term` AS a
        LEFT JOIN `posts` AS b ON a.post_id = b.id
        LEFT JOIN `terms` AS c ON a.term_id = c.id
        WHERE b.post_language = 1 AND b.post_visibility = 'public' AND b.post_status = 'publish' AND a.term_id = '" . $category_one_id . "'   ORDER BY b.created_at DESC LIMIT 5");

        $data['get_postThree'] = DB::select("SELECT b.* , c.slug, c.name FROM `post_term` AS a
        LEFT JOIN `posts` AS b ON a.post_id = b.id
        LEFT JOIN `terms` AS c ON a.term_id = c.id
        WHERE b.post_language = 1 AND b.post_visibility = 'public' AND b.post_status = 'publish' AND a.term_id = '" . $category_three_id . "' ORDER BY b.posted_date DESC   LIMIT 5");

        // dd($data['get_postTwo']);

        $data['get_postTwo'] = DB::select("SELECT b.* , c.slug, c.name FROM `post_term` AS a
        LEFT JOIN `posts` AS b ON a.post_id = b.id
        LEFT JOIN `terms` AS c ON a.term_id = c.id
        WHERE b.post_language = 1 AND b.post_visibility = 'public' AND b.post_status = 'publish' AND a.term_id = '" . $category_two_id . "' ORDER BY b.created_at DESC   LIMIT 9");

        $timeline_posts = Post::get();

        $timeline = [];
        foreach ($timeline_posts as $post){

                array_push($timeline, (object)[
                    'id' => $post->id,
                    'content' => '<a href="'.$post->post_name.'">'.$post->title.'</a>',
                    'start' =>  $post->created_at,
                ]);
        }

        $data["timeline"] = $timeline;


        $hashids = new Hashids();

        if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') {
            $title = $category->name . " :" . __('theme_magz.category') . " - " . Settings::key('site_name');
        } else {
            $title = Settings::key('site_name') . " - " . __('theme_magz.category') . ": " . $category->name;
        }

        return view(Settings::active_theme('page/home'), $data);
    }

    public function timeLinePosts(){
        $timeline_posts = Post::get();

        $timeline = [];
        foreach ($timeline_posts as $post){

            array_push($timeline, (object)[
                'id' => $post->id,
                'content' => "<a href='/news/".$post->post_name."'>".$post->post_title."</a>",
                'start' =>  $post->created_at,
                'end' =>  date('Y-m-d',strtotime($post->created_at.'+30 days')),
            ]);
        }
        return $timeline;
        return json_encode($timeline);
    }



    /**
     * @param $slug
     * @return RedirectResponse|never|void
     */
    public function show($slug)
    {
        $getCurrentLocale = LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);

        if (Post::article()->wherePostName($slug)->exists()) {
            if (Settings::key('permalink_type')) {
                if (Settings::key('permalink_type') == 'post_name') {
                    $rpost = Post::article()->wherePostName($slug)->first();
                    return $this->ArticleController->show($rpost);
                } else {
                    return abort(404);
                }
            }
        } else if (Post::page()->wherePostName($slug)->exists()) {
            if (Settings::key('page_permalink_type')) {
                if (Settings::key('page_permalink_type') == 'page_name') {
                    $rpage = Post::page()->wherePostName($slug)->first();
                    return $this->PageController->show($rpage);
                } else {
                    return abort(404);
                }
            }
        } else if (Term::Category()->where('slug', $slug)->exists()) {
            if (Settings::key('category_permalink_type')) {
                if (Settings::key('category_permalink_type') == 'category_name') {
                    $rcategory = Term::Category()->where('slug', $slug)
                        ->where('language_id', $id)->first();
                    return $this->CategoryController->index($rcategory);
                } else {
                    return abort(404);
                }
            }
            return redirect()->route('category.show', [$slug]);
        } else {
            return abort(404);
        }
    }

    public function calender(Request $request)
    {
        $date = $request->date;


        $date = empty($date) ? Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
        $previousMonth = $date->copy()->firstOfMonth()->subMonth();
        $nextMonth = $date->copy()->firstOfMonth()->addMonth();
        $firstOfMonth = $date->copy()->firstOfMonth();
        $monthNumber = $firstOfMonth->format('m');
        $selectedYear = $firstOfMonth->year;
        $yearsDropdown = '<select class="year_dropdown" id="calendarYear" onchange=changeYear("'.$monthNumber.'")>';
        for($y = Carbon::now()->format('Y') ; $y > 1947 ; $y--){
            $yearsDropdown .= '<option ' . ($y == $selectedYear ? "selected" : '') . ' value="' . $y . '">' . $y . '</option>';
        }
        $yearsDropdown .= '</select>';
        $html = '<div class="calendar">';
        $html .= '<header><h2><span class="month">' . $date->format('F ') . '</span><span class="year">' . $yearsDropdown . '</span></h2><a class="btn-prev " href="javascript:void(0)" id="prevMonthId" onclick=calenderFunc("'.date("Y-m-d",strtotime($previousMonth)).'")><i class="fas fa-arrow-circle-left"></i></a><a class="btn-next " href="javascript:void(0)" onclick=calenderFunc("'.date("Y-m-d",strtotime($nextMonth)).'")><i class="fas fa-arrow-circle-right"></i></a></header>';
        $html .= '<table>';
        $html .= '<thead><tr>';
        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayLabels as $dayLabel) {

            $html .= $dayLabel=='Fri'|| $dayLabel=='Sat'?'<td class="red">' . $dayLabel . '</td>':'<td>' . $dayLabel . '</td>';
        }
        $html .= '</tr></thead>';

        //// dates

        $html .= '<tbody>';
        $get_events = CalendarEvents::where("event_date", ">=", date("Y-m-d", strtotime($startOfCalendar)))->get();
        $printed = 0;
        $html .= "<tr>";
        while ($startOfCalendar <= $endOfCalendar) {

            if($printed%7==0){
                $printed = 0;
                $html .= '</tr><tr>';
            }


            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'prev-month' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
            $startOfCalendarFormated = $startOfCalendar->format('j');
            $startOfCalendarSqlFormat = $startOfCalendar->format('Y-m-d');
            $html .= $printed==5|| $printed==6?'<td class="' . $extraClass . ' red"><span class="content">':'<td class="' . $extraClass . '"><span class="content">';
            $filled = false;
            foreach ($get_events as $events) {
                if ($events->event_date == $startOfCalendarSqlFormat) {
                    $html .= '<div class="flip-card">';
                    $html .= '<div class="flip-card-inner">';
                    $html .= '<div class="flip-card-front">';
                    $html .=  $startOfCalendarFormated;
                    $html .=  ' </div>';
                    $html .=   '<div class="flip-card-back">';
                    $html .= '<a  href="/dated/' . $startOfCalendarSqlFormat . '">';
                    $html .=   '<img src="' .asset("uploads/calendar").'/'.$events->image . '">';
                    $html .=  '</a>';
                    $html .=  '</div>';
                    $html .=  '</div>';
                    $html .=  '</div>';
                    $filled = true;
                }
            }
            if (!$filled) {
                $html .= '<a  href="/dated/' . $startOfCalendarSqlFormat . '">';
                $html .= $startOfCalendarFormated;
                $html .=  '</a>';

            }
            $html .= '</span></td>';
            $startOfCalendar->addDay();
            $printed++;

        }
        $html .= '</tr>';
        $html .= '</div></div>';

        return response()->json(['calendar' => $html, 'prevMonth' => $previousMonth, 'nextMonth' => $nextMonth]);
    }
    public function landing(){
        echo "Landing route working";
    }



    public function gallery(){

        $gallery = Gallery::where(["post_type"=>"gallery"])->paginate(8);
        $paginate_posts =  Gallery::where(["post_type"=>"gallery"])->paginate(8);
        $latestNews =Posts::query()?Posts::query()->latest()->limit(4)->get():[];



      // return $gallery;

        return view('frontend.magz.page.gallery',compact('gallery','paginate_posts','latestNews'));
    }
    public function video(){
        $latestNews =Posts::query()?Posts::query()->latest()->limit(4)->get():[];
        //$videos = DB::table('videos')->select("id","url")->distinct()->orderBy('id', 'desc')->take(8)->get(['url']);
        $videos = DB::table('videos')->paginate(8);
        $paginate_posts =  Video::paginate(8);
      //  return $paginate_posts;

                return view('frontend.magz.page.video',compact('videos','paginate_posts','latestNews'));
    }

    public function landingPage(){


//        $news = DB::select("SELECT b.*, c.slug, c.name FROM `post_term` AS a
//        LEFT JOIN `posts` AS b ON a.post_id = b.id
//        LEFT JOIN `terms` AS c ON a.term_id = c.id
//        WHERE b.post_language = 1 AND b.post_visibility = 'public' AND b.post_status = 'publish' AND a.term_id = 30  ORDER BY b.created_at DESC LIMIT 9");
//
//        $speeches = DB::select("SELECT b.*, c.slug, c.name FROM `post_term` AS a
//        LEFT JOIN `posts` AS b ON a.post_id = b.id
//        LEFT JOIN `terms` AS c ON a.term_id = c.id
//        WHERE b.post_language = 1 AND b.post_visibility = 'public' AND b.post_status = 'publish' AND a.term_id = 29  ORDER BY b.created_at DESC LIMIT 9");
//
//        $gallery = Gallery::where(["post_type"=>"gallery"])->take(12)->get();
//        $videos = DB::SELECT("SELECT DISTINCT url, id FROM videos ORDER BY id DESC LIMIT 3");

        $slider = DB::SELECT("SELECT *, YEAR(created_at) as post_year
FROM posts
WHERE MONTH(created_at) = MONTH(NOW()) AND DAY(created_at) = DAY(NOW())
GROUP BY YEAR(created_at), id, post_title, post_name, created_at");





        // return $videos;
        return view('frontend.magz.page.landingpage',compact('slider'));

    }

    public function landingTimeLinePosts(){
        $timeline_posts = DB::SELECT("SELECT id, post_title, post_name, created_at, YEAR(created_at) as post_year
FROM posts
WHERE MONTH(created_at) = MONTH(NOW()) AND DAY(created_at) = DAY(NOW())
GROUP BY YEAR(created_at), id, post_title, post_name, created_at");

        $timeline = [];
        foreach ($timeline_posts as $post){

            array_push($timeline, (object)[
                'id' => $post->id,
                'content' => "<a onclick=showPost(".$post->id.")>".$post->post_title."</a>",
                'start' =>  date("Y",strtotime($post->created_at))."-01-01",
                'end' =>  date('Y',strtotime($post->created_at.'+3 years'))."-01-01",
            ]);
        }
        return $timeline;
    }

}
