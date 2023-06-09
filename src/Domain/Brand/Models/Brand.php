<?php

namespace Domain\Brand\Models;

use Domain\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'logo',
    ];

    protected $casts = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getLogoAttribute()
    {
        return is_file(public_path() . $this->logo) ? url("/") . $this->logo : defaultImage();
    }
}
