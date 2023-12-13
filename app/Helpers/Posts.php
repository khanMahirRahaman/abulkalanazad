<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\{Language, Post, Term, User};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Auth, DB, File, Schema, Storage};
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Posts
{
    /**
     * @return mixed
     */
    public static function query()
    {
        $getCurrentLocale = LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        $id = Languages::getIdFromLanguageCode($getCurrentLocale);

        $query = Post::with(['terms', 'user.roles', 'language'])
            ->article()
            ->where('post_language', $id)
            ->publish();
        if (Auth::check()) {
            return $query->public();
            if (Auth::user()->hasRole('super-admin')) {
                return $query;
            } else {
                if (Auth::user()->can('read-private-post')) {
                    if (Auth::user()->hasRole('admin')) {
                        return $query->where(function ($query_post) {
                            foreach ($query_post->with('user.roles')->get() as $post) {
                                if ($post->user->getRoleNames()->first() == 'admin') {
                                    $query_post->public()
                                        ->orWhere(function ($q) {
                                            $q->private()->where('post_author', Auth::id());
                                        });
                                } else {
                                    $query_post->public();
                                }
                            }
                        });
                    }
                } else {
                    if (Auth::user()->hasRole(['author'])) {
                        return $query->where(function ($query_post) {
                            $posts = $query_post->get();
                            foreach ($posts->with('user.roles')->get() as $post) {
                                if ($post->user->getRoleNames()->first() == 'author') {
                                    $query_post->public()
                                        ->orWhere(function ($q) {
                                            $q->private()->where('post_author', Auth::id());
                                        });
                                } else {
                                    $query_post->public();
                                }
                            }
                        });
                    } else {
                        return $query->public()
                            ->orWhere(function ($query_post) {
                                $query_post->private()
                                    ->where('post_author', Auth::id());
                            });
                    }
                }
            }
        } else {
            return $query->public();
        }
    }

    /**
     * recentPostSidebar
     *
     * @return void
     */
    public static function recentPostSidebar()
    {
        return self::query()->latest()->limit(4)->get();
    }

    /**
     * @return mixed
     */
    public static function popularPosts()
    {
        return self::query()->orderBy('post_hits', 'DESC');
    }

    /**
     * @return mixed
     */
    public static function recentPosts()
    {
        return self::query()->latest();
    }



    /**
     * @return mixed
     */
    public static function lastWeekPosts()
    {
        return self::query()->whereDate('created_at', '>', \Carbon\Carbon::now()->subWeek())->orderBy('post_hits', 'DESC');
    }

    /**
     * @param $post
     * @return mixed
     */
    public static function next($post)
    {
        return self::query()->where('id', '>', $post->id);
    }

    /**
     * @param $post
     * @return mixed
     */
    public static function previous($post)
    {
        return self::query()->where('id', '<', $post->id);
    }

    /**
     * @return Builder[]|Collection
     */
    public static function tagCount()
    {
        return Term::tag()->currentLanguage()->whereHas('posts')->withCount('posts')->orderBy('posts_count', 'desc')->get();
    }

    /**
     * @param $query
     * @return string
     */
    public static function linkCategory($query)
    {
        $getCurrentLocale = LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');
        if ($query->terms()->where('taxonomy', 'category')->first()) {
            return $query->terms()->where('taxonomy', 'category')->first()->getTranslation('slug', $getCurrentLocale);
        } else {
            return '';
        }
    }

    /**
     * @param $query
     * @return string
     */
    public static function getCategory($query)
    {
        if ($query->terms()->where('taxonomy', 'category')->first()) {
            return $query->terms()->where('taxonomy', 'category')->first()->name;
        } else {
            return '';
        }
    }

    /**
     * @param $query
     * @return string
     */
    public static function getSinglePostCategory($query)
    {
        $query->load(['terms' => function ($qry) {
            $qry->where('taxonomy', 'category');
        }])->first();

        return $query->terms->first() ? $query->terms->first()->name : '';
    }

    /**
     * @param $label
     * @return mixed
     */
    public static function label($label)
    {
        $term_id          = Term::firstWhereSlug($label)->id;
        $term_taxonomy_id = Term::firstWhereTermId($term_id)->id;
        $termTaxonomy     = Term::with('posts')->find($term_taxonomy_id);
        return $termTaxonomy->posts()->latest();
    }

    /**
     * @param $image
     * @return string
     */
    public static function postThumb($image)
    {

        // Path to store the resized image
        $path = storage_path('app/public/images');

        // Desired fixed width and height for the generated image
        $fixedWidth = 1400;
        $fixedHeight = 800;

        // Load the original image using Intervention Image
        $img = Image::make($image);

        // Calculate the aspect ratio of the original image
        $originalAspectRatio = $img->width() / $img->height();

        // Calculate the aspect ratio of the fixed size
        $fixedAspectRatio = $fixedWidth / $fixedHeight;

        // Calculate the new dimensions to fit the image within the fixed size
        if ($originalAspectRatio > $fixedAspectRatio) {
            $newWidth = $fixedWidth;
            $newHeight = $newWidth / $originalAspectRatio;
        } else {
            $newHeight = $fixedHeight;
            $newWidth = $newHeight * $originalAspectRatio;
        }

        // Resize the image
        $img->resize($newWidth, $newHeight);

        // Create a canvas of the fixed size with a background color (#808080 in this case)
        $canvas = Image::canvas($fixedWidth, $fixedHeight, '#adadad');

        // Calculate the positioning of the resized image to center it on the canvas
        $x = round(($fixedWidth - $newWidth) / 2);
        $y = round(($fixedHeight - $newHeight) / 2);

        // Insert the resized image onto the canvas
        $canvas->insert($img, 'top-left', $x, $y);

        // Generate a random filename with a .webp extension
        $fileName = Str::random(10) . '.webp';

        // Save the generated image in WebP format to the specified path
        $canvas->save($path . '/' . $fileName, 100, 'webp');



        return $fileName;
    }

    /**
     * @param $image
     * @return string
     */
    public static function getPostThumb($image)
    {
        if (empty($image)) {
            $file = file_get_contents(public_path('img/noimage.png'));
            $type = File::mimeType(public_path('img/noimage.png'));
        } else {
            $exists = Storage::disk('public')->exists('images/' . $image);
            if (!$exists) {
                $file = public_path('img/noimage.png');
                $type = File::mimeType($file);
            } else {
                $file = Storage::get('public/images/' . $image);
                $type = Storage::disk('public')->mimeType('images/' . $image);
            }
        }
        return 'data:' . $type . ';base64,' . base64_encode($file);
    }

    /**
     * @param $image
     * @return string|null
     */
    public static function getThumb($image)
    {

        $isExists = Storage::disk('public')->exists('images/' . $image);

        if ($image && $isExists) {
            $file  = Storage::get('public/images/' . $image);
            $type  = Storage::disk('public')->mimeType('images/' . $image);
            return 'data:' . $type . ';base64,' . base64_encode($file);
        }

        return 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D';
    }

    /**
     * @param $post_content
     * @param $post_image
     * @return string
     */
    public static function getImage($post_content, $post_image)
    {
        preg_match_all('/src="([^"]*)"/', $post_content, $result);

        $image = asset('img/noimage.png');

        if (!empty($post_image)) {
            $image = asset('storage/images/' . $post_image);
        } else {
            if ($result[0]) {
                if (Storage::disk('public')->exists('images/' . last(explode('/', $result[1][0])))) {
                    $image = asset('storage/images/' . last(explode('/', $result[1][0])));
                }
            }
        }
        return $image;
    }

    /**
     * @param $post_content
     * @param $post_image
     * @return string
     */
    public static function getImageAlt($post_content, $post_image)
    {
        preg_match_all('/src="([^"]*)"/', $post_content, $result);

        if (!empty($post_image)) {
            if (!empty($post_image)) {
                $image = route('post.image', $post_image);
            } else {
                $image = asset('img/noimage.png');
            }
        } else {
            if ($result[0]) {
                if (Storage::disk('public')->exists('images/' . last(explode('/', $result[1][0])))) {
                    $image = route('post.image', last(explode('/', $result[1][0])));
                } else {
                    $image = asset('img/noimage.png');
                }
            } else {
                $image = asset('img/noimage.png');
            }
        }
        return $image;
    }

    /**
     * @param $lang
     * @param $id
     * @return int
     */
    public static function getTransPostId($lang, $translations)
    {
        $language = Language::find($lang)->language_code;
        return Arr::get(json_decode($translations, true), $language);
    }

    /**
     * @param $postLangCode
     * @param $id
     * @return bool
     */
    public static function checkExistsTrans($postLangCode, $translations)
    {
        $arrTranslations = json_decode($translations, true);
        if (Arr::exists($arrTranslations, $postLangCode)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $lang_id
     * @param $post_id
     * @return mixed
     */
    public static function showTransPostTitle($lang_id, $translations)
    {
        $language = Language::find($lang_id)->language_code;
        $lang_exists = Arr::exists(json_decode($translations, true), $language);

        if ($lang_exists) {
            $post_id_translation = Arr::get(json_decode($translations, true), $language);
            return Post::find($post_id_translation)->post_title;
        } else {
            return '';
        }
    }

    /**
     * @param $post
     * @return string|void
     */
    public static function getRoutePost($post)
    {

        if (Schema::hasTable('settings')) {
            if (Settings::key('permalink')) {
                $year = $post->created_at->format('Y');
                $month = $post->created_at->format('m');
                $day = $post->created_at->format('d');
                if (Settings::key('permalink') == "%year%/%month%/%day%") {
                    return route('article.show', compact('post', 'year', 'month', 'day'));
                } elseif (Settings::key('permalink') == "%year%/%month%") {
                    return route('article.show', compact('post', 'year', 'month'));
                } elseif (Settings::key('permalink') == "post_name") {
                    return route('article.show', compact('post'));
                } else {
                    return route('article.show', compact('post'));
                }
            } else {
                abort(404);
            }
        }
    }

    /**
     * @param $page
     * @return string|void
     */
    public static function getUriPage($page)
    {
        if (Schema::hasTable('settings')) {
            if (Settings::key('page_permalink_type')) {
                if (Settings::key('page_permalink_type') == 'with_prefix') {
                    return route('page.show', compact('page'));
                } else {
                    return route('page.show', compact('page'));
                }
            } else {
                abort(404);
            }
        }
    }

    /**
     * @param $category
     * @return string|void
     */
    public static function getUriCategory($category)
    {
        if (Schema::hasTable('settings')) {
            if (Settings::key('category_permalink_type')) {
                if (Settings::key('category_permalink_type') == 'with_prefix_category') {
                    return route('category.show', compact('category'));
                } else {
                    return route('category.show', compact('category'));
                }
            }
        } else {
            abort(404);
        }
    }
    public static  function dateConverter($date)
    {
        $banglaDate = $date;
        $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বর", ":", ",");
        $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ",");
        // convert all bangle char to English char
        $en_number = str_replace($search_array, $replace_array, $banglaDate);

        return $en_number;
    }
    public static  function weekConverter($date)
    {
        $banglaDate = $date;
        $replace_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বর", ":", ",");
        $search_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ",");
        // convert all bangle char to English char
        $en_number = str_replace($search_array, $replace_array, $banglaDate);

        return $en_number;
    }
    public static function getCategories($id){
        return DB::select("SELECT t.id, t.name
FROM `terms` AS t
JOIN `post_term` AS pt ON t.id = pt.term_id
WHERE pt.post_id = $id  -- Replace [your_post_id] with the actual post_id
  AND t.taxonomy = 'category'
  AND t.id NOT IN (30, 93)");
    }
}
