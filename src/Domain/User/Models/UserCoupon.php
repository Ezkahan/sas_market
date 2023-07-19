<?php

namespace Domain\User\Models;

use Domain\Cart\Models\Cart;
use Domain\Coupon\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCoupon extends Model
{
    protected $fillable = [
        'cart_id',
        'coupon_id',
        'user_id',
        'used_at',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }
}
