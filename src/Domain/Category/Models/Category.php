<?php

namespace Domain\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    public $translatable = [
        'name',
        'description',
    ];

    protected $fillable = [
        'name',
        'description',
        'icon',
        'image',
        'parent_id',
        'visited_count',
    ];

    protected $casts = [
        'name' => 'json',
        'description' => 'json',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
