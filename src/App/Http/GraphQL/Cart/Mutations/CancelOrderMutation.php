<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\Enums\CartStatusEnum;

final class CancelOrderMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];
        $user = auth()->user();
        $cart = $user->getActiveCart();

        if ($cart->status == CartStatusEnum::WAITING->value || $cart->status == CartStatusEnum::IN_PROGRESS->value) {
            $cart->update([
                'status' => CartStatusEnum::CANCELED->value
            ]);
            return 'success';
        }

        return 'error';
    }
}
