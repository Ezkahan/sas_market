<?php

namespace Domain\Brand\Models;

use Domain\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'logo_path',
    ];

    protected $casts = [];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($brand) {
            $logoPath = public_path($brand->logo_path);
            is_file($logoPath) ? File::delete($logoPath) : null;
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getLogoUrlAttribute()
    {
        return is_file(public_path($this->logo_path)) ? url("/") . $this->logo_path : defaultImage();
    }
}
