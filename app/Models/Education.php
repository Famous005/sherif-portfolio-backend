<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'degree', 'field', 'institution', 'grade',
        'start_year', 'end_year', 'is_current',
        'description', 'sort_order',
    ];

    protected $casts = [
        'is_current' => 'boolean',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('start_year');
    }
}
