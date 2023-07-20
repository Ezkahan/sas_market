<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\Models\Cart;

final class OrderChangeStatusMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];
        $status = $args["status"];
        $cart = Cart::find($id);

        if ($cart->update(['status' => $status])) {
            return 'success';
        }

        return 'error';
    }
}
