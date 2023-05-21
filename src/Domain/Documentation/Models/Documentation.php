<?php

namespace Domain\Promotion\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Documentation extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'text',
    ];

    protected $fillable = [
        'title',
        'text',
        'preview',
    ];

    protected $casts = [
        'title' => 'json',
        'text' => 'json',
    ];
}
