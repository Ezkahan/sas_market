<?php

namespace Domain\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\Banner\Enums\BannerEnum;
use Domain\Category\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    protected $fillable = [
        'link',
        'image',
        'visited_count',
        'category_id',
        'position',
    ];

    protected $casts = [
        'position' => BannerEnum::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute()
    {
        return defaultImage();
        // return is_file(public_path() . $this->image) ? url("/") . $this->image : defaultImage();
    }
}
