<?php

namespace App\Helpers;

use App\Models\Language;
use App\Models\Submenu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\TranslationLoader\LanguageLine;

class Languages
{
    function submenu(){
        $menu = Submenu::get();
        return json_encode($menu);
    }
    /**
     * @return Builder
     */
    public static function query(): Builder
    {
        return Language::query();
    }

    /**
     * @param array $column
     * @return Builder
     */
    public static function select(array $column): Builder
    {
        return self::query()->select($column);
    }

    /**
     * @return mixed
     */
    public static function active(): mixed
    {
        return self::query()->active();
    }

    /**
     * @param $value
     * @param $key
     * @return mixed
     */
    public static function pluck($value, $key)
    {
        return self::active()->pluck($value, $key);
    }

    /**
     * @return mixed
     */
    public static function showDropdown(): mixed
    {
        return self::query()->active()->get();
    }

    /**
     * @return mixed
     */
    public static function activeCount()
    {
        return self::active()->count();
    }

    /**
     * @param $code
     * @return HigherOrderBuilderProxy|mixed
     */
    public static function getIdFromLanguageCode($code): mixed
    {
        return self::select(['id'])->firstWhere('language_code', $code)->id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getCodeFromLanguageId($id): mixed
    {
        return self::select(['language_code'])->find('id', $id)->language_code;
    }

    /**
     * @return mixed
     */
    public static function codeSession()
    {
        return Language::find(Auth::user()->language)->language_code;
    }

    /**
     * @return mixed
     */
    public static function getCodeLanguageAuthSession()
    {
        return Language::find(Auth::user()->language)->language_code;
    }

    /**
     * @return mixed
     */
    public static function getCodeLanguage($id)
    {
        $getCurrentLocale= LaravelLocalization::getCurrentLocale() ? LaravelLocalization::getCurrentLocale() : Settings::key('theme_language');

        return Language::find($id)->language_code;
    }


    /**
     * @return Builder[]|Collection
     */
    public static function get()
    {
        return self::query()->get();
    }

    /**
     * @return mixed
     */
    public static function getDefault()
    {
        return self::query()->select('language')->where('default', 'y')->first()->language;
    }

	/**
	 * @return mixed
	 */
	public static function getLangIdDefault()
	{
		return self::query()->where('default', 'y')->first()->id;
	}

	/**
	 * getLangCodeDefault
	 *
	 * @return void
	 */
	public static function getLangCodeDefault()
	{
		return self::query()->select('language_code')->where('default', 'y')->first()->language_code;
	}

    /**
     * @param $code
     * @return mixed
     */
    public static function isExists($id)
    {
        return self::query()->where('id', $id)->exists();
    }

    /**
     * @return int
     */
    public static function count()
    {
        return count(self::query()->active()->get());
    }

    /**
     * @return mixed
     */
    public static function getCustomSelect(array $column)
    {
        return self::query()->select($column)->get();
    }

	/**
	* @return mixed
	*/
	public static function group($group)
	{
		$trans = LanguageLine::where('group', $group)->get();
		return json_decode($trans, true);
	}

	/**
	* @return mixed
	*/
	public static function show()
	{
		return self::query()->active()->pluck('language', 'language_code');
	}

	/**
	* @return mixed
	*/
	public static function showWithKeyId()
	{
		return self::query()->pluck('language', 'id');
	}

	/**
	* @return mixed
	*/
	public static function showWithFlag()
	{
		return self::query()->select('id', 'language', 'language_code', 'country', 'country_code')->get();
	}

	/**
	* @param $language_code
	* @return string
     */
	public static function showFlag($language_code)
	{
		$code = self::query()->where('language_code',$language_code)->first()->country_code;
		return strtolower($code);
	}

	/**
	* @return mixed
	*/
	public static function find($id)
	{
		return self::query()->find($id);
	}

	/**
	* @param $code
	* @return mixed
	*/
	public static function getName($id)
	{
        return self::query()->select('language')->where('id', $id)->first()->language;
	}

	/**
	* @param $code
	* @return mixed
	*/
	public static function findId($code)
	{
		return self::query()->select('id')->where('language_code', $code)->first()->id;
	}

	/**
	* @return mixed
	*/
	public static function showLangSession()
	{
		return Auth::user()->language;
	}

    /**
     * @return mixed
     */
    public static function user()
    {
        return Auth::user()->language;
    }

	/**
	* @return mixed
	*/
	public static function showIdLangCodeSession()
	{
		return self::findId(self::showLangSession());
	}

	/**
	* @param $id
	* @return mixed
	*/
	public static function showCodeLanguage($id)
	{
		return Language::find($id)->language_code;
	}

    /**
     * @param $code
     * @return mixed
     */
    public static function showIdLanguage($code)
    {
        return self::query()->where('language_code', $code)->first()->id;
    }

    /**
     * @param $code
     * @return mixed
     */
    public static function getLangIdByCode($code)
    {
        return self::query()->firstWhere('language_code', $code)->id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getLangCodeById($id)
    {
        return Language::find($id)->language_code;
    }

    /**
     * @return mixed
     */
    public static function showIdLangSession()
    {
        return Languages::find(self::showLangSession())->id;
    }

    /**
     * @return mixed
     */
    public static function direction()
    {
        return Auth::user()->userLanguage->direction;
    }
}
