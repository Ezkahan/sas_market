<?php

namespace App\Http\GraphQL\Product\Queries;

use Domain\Category\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final class GetCategoryProductsQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];
        $types = array_key_exists('types', $args) ? $args["types"] : null;
        $brands = array_key_exists('brands', $args) ? $args["brands"] : null;

        $category = Category::with('products')->where('id', '=', $id)->first();
        // $category->products()->whereIn('brand_id', '=', $brands);

        // foreach ($types as $type) {
        //     $category->where('type', '=', Str::upper($type));
        // }

        return $category;
    }
}
