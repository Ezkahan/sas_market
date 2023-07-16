<?php

namespace App\Http\GraphQL\Coupon\Queries;

use Domain\Coupon\Models\Coupon;

final class GetCouponListQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        $usedCouponsID = $user->coupons()->get(['coupon_id']);
        $couponList = Coupon::where('confirmed', true)->whereNotIn('id', $usedCouponsID)->get();

        return $couponList;
    }
}
