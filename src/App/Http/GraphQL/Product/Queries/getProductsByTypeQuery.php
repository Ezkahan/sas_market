<?php

namespace App\Http\GraphQL\Product\Queries;

use Carbon\Carbon;
use Domain\Product\Models\Product;

final class getProductsByTypeQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        switch ($args["type"]) {
            case "DISCOUNT": {
                    return Product::where('discount_amount', '>', 0)->get();
                }
            case "NEW": {
                    return Product::whereDate('created_at', '>', Carbon::now()->subDays(10))->get();
                }
            case "SPECIALLY": {
                    return Product::where('specially', '=', true)->get();
                }
            default: {
                    return [];
                }
        }
    }
}
