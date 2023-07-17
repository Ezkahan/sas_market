<?php

namespace App\Http\GraphQL\Coupon\Mutations;

use Domain\Coupon\DTO\CouponDTO;
use Domain\Coupon\Models\Coupon;

final class SaveCouponMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new CouponDTO(
            $args["title"],         //: JSON!
            $args["discount"],      //: Int!
            $args["discount_type"], //: String!
            $args["expires_at"],    //: DateTime!
            $args["type"],          //: String!
        );

        if (array_key_exists('id', $args) && $args["id"]) {
            $coupon = Coupon::find($args["id"]);
            $coupon->update($data->toArray());
        } else {
            $coupon = Coupon::create($data->toArray());
        }

        return $coupon;
    }
}
