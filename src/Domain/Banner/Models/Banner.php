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
        'image_path',
        'visited_count',
        'category_id',
        'position',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute()
    {
        return is_file(public_path() . $this->image_path) ? url("/") . $this->image_path : defaultImage();
    }
}
