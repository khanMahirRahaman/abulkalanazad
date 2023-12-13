<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Socialmedia extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'socialmedia';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'icon', 'slug', 'color'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return BelongsToMany
     */
    public function users()
    {
    return $this->belongsToMany('App\Models\User', 'user_socialmedia', 'socialmedia_id', 'user_id')->withTimestamps();
    }

    /**
     * Get the posts.
     */
    public function site()
    {
        return $this->hasOne(SiteSocialmedia::class);
    }
}
