<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'category', 'proficiency', 'icon', 'sort_order'];

    public function scopeGroupedByCategory($query)
    {
        return $query->orderBy('category')->orderBy('sort_order');
    }
}
