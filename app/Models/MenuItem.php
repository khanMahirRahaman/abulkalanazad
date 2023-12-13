<?php

namespace App\Models;
use App\Helpers\Languages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MenuItem extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['label', 'link', 'parent', 'sort', 'class', 'menu_id', 'language', 'depth'];

    /**
     * @return BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * @return BelongsTo
     */
    public function lang()
    {
        return $this->belongsTo(Language::class, 'language');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getsons($id)
    {
        return $this->where("parent", $id)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getall($id)
    {
        $language = Languages::findId(LaravelLocalization::getCurrentLocale());
        return $this->where("menu", $id)->where('language', $language)->orderBy("sort")->get();
    }

    /**
     * @param $menu
     * @return int
     */
    public static function getNextSortRoot($menu)
    {
        return self::where('menu', $menu)->max('sort') + 1;
    }

    /**
     * @return BelongsTo
     */
    public function parent_menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu');
    }

    /**
     * @return HasMany
     */
    public function child()
    {
        return $this->hasMany('App\Models\MenuItem', 'parent')->orderBy('sort', 'ASC');
    }
}
