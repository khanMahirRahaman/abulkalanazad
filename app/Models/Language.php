<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language', 'language_code', 'country', 'country_code', 'direction', 'active', 'default'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'language_code';
    }

    /**
     * @return BelongsToMany
     */
    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'menu_languages','language_id','menu_id')->withTimestamps();
    }

    /**
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->whereActive('y');
    }
}
