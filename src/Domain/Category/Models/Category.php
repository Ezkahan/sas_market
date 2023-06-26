<?php

namespace Domain\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    public $translatable = [
        'name',
        'description',
    ];

    protected $fillable = [
        'name',
        'description',
        'icon_path',
        'image_path',
        'parent_id',
        'visited_count',
    ];

    protected $casts = [
        'name'        => 'json',
        'description' => 'json',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function getNameAttribute()
    {
        return $this->getTranslations('name');
    }

    public function getDescriptionAttribute()
    {
        return $this->getTranslations('description');
    }

    public function getIconAttribute()
    {
        return is_file(public_path($this->icon_path)) ? url("/") . $this->icon_path : defaultImage();
    }

    public function getImageAttribute()
    {
        return is_file(public_path($this->image_path)) ? url("/") . $this->image_path : defaultImage();
    }
}
