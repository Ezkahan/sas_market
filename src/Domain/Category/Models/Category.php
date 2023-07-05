<?php

namespace Domain\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
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

    public function getIconUrlAttribute()
    {
        return is_file(public_path($this->icon_path)) ? url("/") . $this->icon_path : defaultImage();
    }

    public function getImageUrlAttribute()
    {
        return is_file(public_path($this->image_path)) ? url("/") . $this->image_path : defaultImage();
    }

    public function deleteIcon()
    {
        $iconPath = public_path($this->icon_path);
        if (is_file($iconPath)) {
            File::delete($iconPath);
            $this->update(['icon_path' => null]);
        }
        return;
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
