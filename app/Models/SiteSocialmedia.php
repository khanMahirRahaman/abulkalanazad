<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSocialmedia extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'site_socialmedia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'socialmedia_id', 'name', 'url'
    ];

    /**
     * @return BelongsTo
     */
    public function socialmedia()
    {
        return $this->belongsTo(Socialmedia::class);
    }
}
