<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdPlacement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'active'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * @return BelongsTo
     */
    public function ad(): BelongsTo
    {
        return $this->belongsTo(Advertisement::class, 'unit');
    }
}
