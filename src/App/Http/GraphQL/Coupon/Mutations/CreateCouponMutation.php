<?php

namespace App\Http\GraphQL\Coupon\Mutations;

use Domain\Coupon\Actions\CreateCouponAction;
use Domain\Coupon\DTO\CouponDTO;

final class CreateCouponMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new CouponDTO(
            $args["title"],
            $args["promo_price"],
            $args["started_at"],
            $args["ended_at"]
        );

        return app(CreateCouponAction::class)->run($data);
    }
}
