<?php

namespace App\Http\GraphQL\Product\Queries;

final class GetCategoryProductsQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];
        $type = $args["type"];
        $brand_id = $args["brand_id"];

        return;
    }
}
