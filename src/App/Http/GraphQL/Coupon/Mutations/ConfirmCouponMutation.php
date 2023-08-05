<?php

namespace App\Http\GraphQL\Coupon\Mutations;

use Domain\Coupon\Models\Coupon;

final class ConfirmCouponMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        $coupon = Coupon::find($args["id"]);

        if ($user->role === "BOSS") {
            $coupon->update([
                'confirmed' => true,
            ]);
            return 'success';
        }

        return 'error';
    }
}
