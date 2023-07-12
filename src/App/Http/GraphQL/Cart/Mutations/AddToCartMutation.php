<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\Actions\AddToCartAction;
use Domain\Cart\DTO\CartDTO;

final class AddToCartMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new CartDTO(
            $args['product_id'],
            $args['quantity'],
            $args['address'],
            $args['note'],
            $args['pay_type'],
        );

        app(AddToCartAction::class)->run($data);
    }
}
