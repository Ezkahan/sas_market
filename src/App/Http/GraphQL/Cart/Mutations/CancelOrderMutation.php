<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\Enums\CartStatusEnum;
use Domain\Cart\Models\Cart;

final class CancelOrderMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // $user = auth()->user();
        $cart = Cart::find($args["id"]);

        if ($cart->status == CartStatusEnum::WAITING->value || $cart->status == CartStatusEnum::IN_PROGRESS->value) {
            $cart->update([
                'status' => CartStatusEnum::CANCELED->value
            ]);
            return 'success';
        }

        return 'error';
    }
}
