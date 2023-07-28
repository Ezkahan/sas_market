<?php

namespace Domain\Cart\Models;

use Domain\Cart\Enums\CartStatusEnum;
use Domain\Coupon\Enums\DiscountTypeEnum;
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
        $couponTotal = 0;

        $totalCost = $this->products()
            ->sum(
                DB::raw('cart_products.price * cart_products.quantity')
            );

        $totalDiscount = $this->products()
            ->sum(
                DB::raw('cart_products.discount_price * cart_products.quantity')
            );
        $coupons = $this->coupons;

        foreach ($coupons as $coupon) {
            $cp = $coupon->coupon;

            if ($cp->discount_type == DiscountTypeEnum::FIX_PRICE->value) {
                $couponTotal = $cp->discount;
            }

            if ($cp->discount_type == DiscountTypeEnum::PERCENT->value) {
                $percentTotal = ($totalCost * $cp->discount) / 100;
                $couponTotal = $couponTotal + $percentTotal;
            }
        }

        $sum = ($totalCost - ($totalCost - $totalDiscount) - $couponTotal);
        $total = $sum < 0 ? 0 : $sum;

        return [
            'totalCost'     => $totalCost,
            'totalDiscount' => $totalCost - $totalDiscount,
            'couponTotal'   => $couponTotal,
            'total'         => $total,
        ];
    }

    public function getProductsCountAttribute()
    {
        return $this->products()->count();
    }
}
