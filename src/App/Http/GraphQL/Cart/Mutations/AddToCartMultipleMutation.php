<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\Actions\AddToCartMultipleAction;

final class AddToCartMultipleMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $products = array_key_exists('products', $args) ? $args["products"] : null;

        if ($products) {
            return app(AddToCartMultipleAction::class)->run($products);
        }

        return;
    }
}
