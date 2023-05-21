<?php

namespace Domain\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'title',
        'description',
        'code',
        'brand_id',
        'category_id',
        'price',
        'percent',
        'in_stock',
        'status',
        'stock',
        'preview',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
}
