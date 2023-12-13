<?php

namespace App\Models;

use App\Helpers\Languages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Menu extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * @param $name
     * @return mixed
     */
    public static function byName($name)
    {
        return self::where('name', '=', $name)->first();
    }

    /**
     * @return HasMany
     */
    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_id')->with('child');
    }

    /**
     * @return BelongsToMany
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class,'menu_languages','menu_id','language_id')->withTimestamps();
    }
}
