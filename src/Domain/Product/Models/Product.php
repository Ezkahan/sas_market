<?php

namespace Domain\Product\Models;

use Domain\Brand\Models\Brand;
use Domain\Category\Models\Category;
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
        'title'       => 'json',
        'description' => 'json',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTitleAttribute()
    {
        return $this->getTranslations('title');
    }

    public function getDescriptionAttribute()
    {
        return $this->getTranslations('description');
    }
}
