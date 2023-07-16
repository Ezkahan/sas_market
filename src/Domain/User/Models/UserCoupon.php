<?php

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    protected $fillable = [
        'cart_id',
        'coupon_id',
        'user_id',
        'used_at',
    ];
}
