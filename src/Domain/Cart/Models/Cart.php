<?php

namespace Domain\Cart\Models;

use Domain\User\Models\User;
use Domain\User\Models\UserAddress;
use Domain\User\Models\UserCoupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'address_id',
        'note',
        'pay_type',
        'delivery_type',
        'status',
    ];

    protected $casts = [];

    public function products(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupons()
    {
        return $this->hasMany(UserCoupon::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(UserAddress::class);
    }

    public function getSummaryAttribute()
    {
        $totalCost = $this->products()
            ->sum(
                DB::raw('cart_product.price * cart_product.quantity')
            );

        $totalDiscount = $this->products()
            ->sum(
                DB::raw('cart_product.discount_price * cart_product.quantity')
            );

        return [
            'totalDiscount' => $totalDiscount,
            'totalCost'     => $totalCost,
            'couponTotal'   => 0,
        ];
    }
}
