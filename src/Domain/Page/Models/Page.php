<?php

namespace Domain\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'text',
    ];

    protected $fillable = [
        'title',
        'text',
        'image_path',
        'position',
    ];

    protected $casts = [
        'title' => 'json',
        'text'  => 'json',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($page) {
            $imagePath = public_path($page->image_path);
            is_file($imagePath) ? File::delete($imagePath) : null;
        });
    }

    public function getTitleAttribute()
    {
        return $this->getTranslations('title');
    }

    public function getTextAttribute()
    {
        return $this->getTranslations('text');
    }

    public function getImageUrlAttribute()
    {
        return is_file(public_path($this->image_path)) ? url("/") . $this->image_path : defaultImage();
    }

    public function deleteImage()
    {
        $imagePath = public_path($this->image_path);
        if (is_file($imagePath)) {
            File::delete($imagePath);
            $this->update(['image_path' => null]);
        }
        return;
    }
}
