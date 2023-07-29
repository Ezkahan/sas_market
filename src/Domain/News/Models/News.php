<?php

namespace Domain\News\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'title',
        'description',
        'image_path',
    ];

    protected $casts = [
        'title'       => 'json',
        'description' => 'json',
    ];

    public function getTitleAttribute()
    {
        return $this->getTranslations('title');
    }

    public function getDescriptionAttribute()
    {
        return $this->getTranslations('description');
    }

    public function getImageUrlAttribute()
    {
        return is_file(public_path($this->image_path)) ? url("/") . $this->image_path : defaultImage();
    }
}
