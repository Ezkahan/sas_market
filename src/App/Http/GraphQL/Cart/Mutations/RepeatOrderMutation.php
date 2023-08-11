<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\Models\Cart;

final class RepeatOrderMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $cart = Cart::find($args["id"]);
        $activeCart = auth()->user()->getActiveCart();

        foreach ($cart->products as $product) {
            $activeCart->products()->create([
                'product_id' => $product->product_id,
                'quantity'   => $product->quantity,
            ]);
        }

        return $activeCart;
    }
}
