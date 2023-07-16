<?php

namespace App\Http\GraphQL\Coupon\Mutations;

use Carbon\Carbon;

final class ApplyCouponMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        $cartID = $user->cart->id;

        $user->coupons()->create([
            'cart_id' => $cartID,
            'coupon_id' => $args["coupon_id"],
            'used_at' => Carbon::now(),
        ]);

        return 'success';
    }
}
