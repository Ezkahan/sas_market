<?php

namespace App\Http\GraphQL\Cart\Queries;

use Domain\Cart\Models\Cart;
use Illuminate\Support\Facades\Log;

final class GetOrderQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $cart = Cart::find($args["id"]);
        Log::info($cart);

        return $cart;
    }
}
