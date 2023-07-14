<?php

namespace App\Http\GraphQL\Coupon\Mutations;

use Domain\Coupon\DTO\CouponDTO;
use Domain\Coupon\Models\Coupon;

final class AddCouponMutation
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

        $coupon = Coupon::create($data->toArray());
    }
}
