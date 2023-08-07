<?php

namespace Domain\Category\Models;

use Domain\Banner\Models\Banner;
use Domain\Brand\Models\Brand;
use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id', 'parent_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class);
    }

    public function scopeMainCategories()
    {
        return $this->where('parent_id', 0);
    }

    public function scopeSubCategories()
    {
        return $this->where('parent_id', '!=', 0);
    }

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

    public function getCategoryBrandsAttribute()
    {
        $brandsID = $this->products()->get()->pluck("brand_id");
        $brands = Brand::whereIn('id', $brandsID)->get();
        return $brands;
    }

    public function getProductsAttribute($brands)
    {
        return $this->products()->whereIn('brand_id', '=', $brands);
    }
}
