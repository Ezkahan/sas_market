<?php

namespace Domain\Coupon\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Coupon extends Model
{
    use HasTranslations;

    public $translatable = ['title'];

    protected $fillable = [
        'title',
        'discount',
        'discount_type',
        'confirmed',
        'type',
        'expires_at',
    ];

    protected $casts = [
        'title'      => 'json',
        'expires_at' => 'datetime',
    ];

    protected $dates = [
        'expires_at',
    ];

    public function getTitleAttribute()
    {
        return $this->getTranslations('title');
    }
}
