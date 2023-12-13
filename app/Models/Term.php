<?php

namespace App\Models;

use App\Helpers\Localization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Term extends Model
{
    use HasFactory;

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'taxonomy', 'description', 'parent', 'language_id', 'translation', 'image'
    ];


    /**
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * @param $query
     */
    public function scopeCategory($query)
    {
        $query->where('taxonomy', 'category');
    }

    /**
     * @param $query
     */
    public function scopeTag($query)
    {
        $query->where('taxonomy', 'tag');
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeCurrentLanguage($query)
    {
        $query->where('language_id', Localization::getCurrentLocaleId());
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeCurrentLangAuth($query)
    {
        $query->where('language_id', Localization::getCurrentLocaleAuthdId());
    }

    /**
     * @param $query
     * @param $name
     */
    public function scopeOfName($query, $name)
    {
        $query->where('name', $name);
    }

    /**
     * @param $query
     * @param $name
     */
    public function scopeSearchName($query, $name)
    {
        $query->where("name", "LIKE", "%$name%");
    }
}
