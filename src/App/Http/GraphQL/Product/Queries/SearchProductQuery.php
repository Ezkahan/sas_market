<?php

namespace App\Http\GraphQL\Product\Queries;

use Domain\Product\Models\Product;

final class SearchProductQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $name = $args["name"];

        $products =  Product::where("title->tm", 'LIKE', '%' . $name . '%')->get();

        return $products;
    }
}
