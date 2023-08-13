<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Order\Models\QuickOrder;
use Domain\Product\Models\Product;

final class QuickOrderMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $products = array_key_exists('products', $args) ? $args["products"] : [];

        $data = [
            'name'          => $args["name"],
            'address'       => $args["address"],
            'phone'         => $args["phone"],
            'note'          => $args["note"] ?? null,
            'delivery_type' => $args["delivery_type"],
            'delivery_time' => $args["delivery_time"],
            'pay_type'      => $args["pay_type"],
        ];

        $order = QuickOrder::create($data);

        foreach ($products as $product) {
            $p = Product::find($product["product_id"]);

            $order->quickOrderProducts()->create([
                'product_id'     => $product["product_id"],
                'quantity'       => $product["quantity"],
                'price'          => $p->price,
                'discount_price' => $p->discount_price,
            ]);
        }

        return $order;
    }
}
