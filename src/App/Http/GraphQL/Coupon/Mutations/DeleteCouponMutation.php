<?php

namespace App\Http\GraphQL\Coupon\Mutations;

use Domain\Category\Actions\DeleteCouponAction;

final class DeleteCouponMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return app(DeleteCouponAction::class)->run($args["id"]);
    }
}
