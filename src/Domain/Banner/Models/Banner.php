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
}
