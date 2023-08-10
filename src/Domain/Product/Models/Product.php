<?php

namespace Domain\Product\Models;

use Domain\Brand\Models\Brand;
use Domain\Category\Models\Category;
use Domain\Product\Enums\DiscountTypeEnum;
use Domain\User\Models\UserFavorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'title',
        'description',
        'code',
        'brand_id',
        'category_id',
        'price',
        'discount_amount',
        'discount_type',
        'in_stock',
        'status',
        'stock',
        'preview',
        'specially',
    ];

    protected $casts = [
        'title'       => 'json',
        'description' => 'json',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getTitleAttribute()
    {
        return $this->getTranslations('title');
    }

    public function getDescriptionAttribute()
    {
        return $this->getTranslations('description');
    }

    public function getImagesAttribute()
    {
        return $this->images;
    }

    public function getIsFavoriteAttribute()
    {
        if (Auth::check()) {
            return UserFavorite::where('product_id', '=', $this->id)->where('user_id', '=', auth()->id())->exists();
        }
        return false;
    }

    public function getImageAttribute()
    {
        $firstImage = $this->images()->first();

        if ($firstImage) {
            $imgPath = $firstImage->image_path;
            return is_file(public_path() . $imgPath) ? url('/') . $imgPath : defaultImage();
        }

        return defaultImage();
    }

    public function getDiscountPriceAttribute(): int | null
    {
        switch ($this->discount_type) {
            case DiscountTypeEnum::FIX_PRICE->value: {
                    return $this->price - $this->discount_amount;
                }
            case DiscountTypeEnum::PERCENT->value: {
                    $discount = ($this->price * $this->discount_amount) / 100;
                    return $this->price - $discount;
                }
            default: {
                    return null;
                }
        }
    }

    public function getSimilarProductsAttribute()
    {
        return $this->where('category_id', '=', $this->category_id)
            ->where('brand_id', '=', $this->brand_id)
            ->where('id', '!=', $this->id)
            ->inRandomOrder()
            ->get();
    }
}
