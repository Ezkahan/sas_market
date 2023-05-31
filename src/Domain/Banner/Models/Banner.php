<?php

namespace Domain\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\Banner\Enums\BannerEnum;

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

    public function getImageAttribute()
    {
        return defaultImage();
        // return is_file(public_path() . $this->image) ? url("/") . $this->image : defaultImage();
    }
}
