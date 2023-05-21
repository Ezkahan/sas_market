<?php

namespace Domain\Coupon\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\User\Models;
use Spatie\Translatable\HasTranslations;

class Coupon extends Model
{
    use HasTranslations;

    public $translatable = ['title'];

    protected $fillable = [
        'title',
        'promo_price',
        'started_at',
        'ended_at',
    ];

    protected $casts = ['title' => 'json'];

    protected $dates = [
        'started_at',
        'ended_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
