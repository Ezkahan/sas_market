<?php

namespace Domain\Promotion\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Promotion extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'position',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
}
