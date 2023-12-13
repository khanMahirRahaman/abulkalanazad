<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advertisement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'url', 'image', 'size', 'active', 'ga'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * @return HasMany
     */
    public function placement(): HasMany
    {
        return $this->hasMany(AdPlacement::class, 'unit');
    }
}
