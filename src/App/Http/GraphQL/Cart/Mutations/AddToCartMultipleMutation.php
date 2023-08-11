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
        $products = $args["products"];
        return app(AddToCartMultipleAction::class)->run($products);
    }
}
