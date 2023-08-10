<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Order\Models\QuickOrder;

final class QuickOrderMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = [
            'name'          => $args["name"],
            'address'       => $args["address"],
            'phone'         => $args["phone"],
            'note'          => $args["note"] ?? null,
            'delivery_type' => $args["delivery_type"],
            'pay_type'      => $args["pay_type"],
        ];

        $order = QuickOrder::create($data);

        return $order;
    }
}
