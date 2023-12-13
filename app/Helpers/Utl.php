<?php

namespace App\Helpers;

use App\Models\{AdPlacement, Advertisement, Contact, Language, Post, Socialmedia, Term, User};
use App\Services\ArticleService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{Auth, Storage};
use Illuminate\Support\Str;
use Spatie\Permission\Models\{Permission, Role};
use Spatie\TranslationLoader\LanguageLine;

class Utl
{
    /**
     * categoryCount
     *
     * @return void
     */
    public static function categoryCount()
    {
        return Term::where('taxonomy', 'category')->count();
    }

    /**
     * @return mixed
     */
    public static function pageCount() {
        return Post::wherePostType('page')->languageCurrentAuthSession()->count();
    }

    /**
     * @return mixed
     */
    public static function postCount() {
        $article = New ArticleService();
        return $article->query()->count();
    }

    /**
     * tagCount
     *
     * @return void
     */
    public static function tagCount()
    {
        return Term::where('taxonomy', 'tag')->count();
    }

    /**
     * @return mixed
     */
    public static function userCount()
    {
        $currentUser = Auth::user();

        if ($currentUser->hasRole('super-admin')) {
            return User::count();
        } else {
            $roles = User::showRoles();
            return User::role($roles)->count();
        }
    }

    /**
     * @return mixed
     */
    public static function roleCount()
    {
        $currentUser = Auth::user();
        if ($currentUser->hasRole('super-admin')) {
            return Role::count();
        } else {
            return Role::whereIn('name', User::showRoles())->count();
        }
    }

    /**
     * @return mixed
     */
    public static function permissioncount() {
        return Permission::count();
    }

    /**
     * @return mixed
     */
    public static function socialmediaCount() {
        return Socialmedia::count();
    }

    /**
     * @return mixed
     */
    public static function galleryCount() {
        return Post::ofType('gallery')->count();
    }

    /**
     * @return mixed
     */
    public static function advertisementcount() {
        return Advertisement::count();
    }

    /**
     * @return mixed
     */
    public static function adplacementcount() {
        return AdPlacement::count();
    }

    /**
     * @return mixed
     */
    public static function contactCount() {
        return Contact::count();
    }

    /**
     * @return mixed
     */
    public static function languageCount()
    {
        return Language::count();
    }

    /**
     * @return mixed
     */
    public static function translationCount()
    {
        return LanguageLine::count();
    }

    /**
     * @param $path
     * @param $disk
     * @return bool
     */
    public static function checkFileDisk($path, $disk) {
        if(Storage::disk($disk)->exists($path)){
            return true;
        } else {
            return false;
        }
    }


    /**
     * SocialMedia
     *
     * @return array
     */
    public static function SocialMedia()
    {
        return Socialmedia::with('sites')->whereHas('sites')->get();
    }

    /**
     * @param $column
     * @param $lang
     * @param $query
     * @return mixed
     */
    public static function getCategoryTranslation($column, $lang, $query)
    {
        return $query->getTranslation($column, $lang);
    }


    /**
     * substr
     *
     * @param  mixed $string
     * @param  mixed $start
     * @param  mixed $length
     * @return string
     */
    public static function substr($string, $start, $length) {
        return Str::substr($string, $start, $length);
    }

    /**
     * getCurrentLocaleFlag
     *
     * @param  mixed $string
     * @return string
     */
    public static function getCurrentLocaleFlag($string) {
        return Str::lower(Str::substr($string, 3, 2));
    }

    /**
     * @param $permission
     * @return mixed|string
     */
    public static function getModuleFromPermission($permission) {
        $explode = explode('-', $permission);

        if (count($explode) < 3) {
            return Arr::last($explode);
        } else {
            array_shift($explode);
            return implode('-', $explode);
        }
    }

    /**
     * @param $array
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function removeElementWithValue($array, $key, $value)
    {
        foreach($array as $subKey => $subArray){
            if (is_array($value)) {
                foreach($value as $item){
                    if($subArray[$key] == $item){
                        unset($array[$subKey]);
                    }
                }
            } else {
                if ($subArray[$key] == $value) {
                    unset($array[$subKey]);
                }
            }
        }
        return $array;
    }
}
