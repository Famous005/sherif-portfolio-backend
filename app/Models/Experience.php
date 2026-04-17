<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title', 'company', 'location',
        'start_date', 'end_date', 'is_current',
        'responsibilities', 'sort_order',
    ];

    protected $casts = [
        'responsibilities' => 'array',
        'is_current'       => 'boolean',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('start_date');
    }
}
