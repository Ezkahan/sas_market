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
        $types = $args["types"];
        $brands = $args["brands"];
        $category = Category::find($id);
        $category->products($brands);

        // Log::debug($types);
        // Log::debug("___________");
        // Log::debug($brands);

        // foreach ($brands as $brand) {
        //     Log::alert($brand);
        // }

        // Log::debug("___________");

        foreach ($types as $type) {
            $category->where('type', '', Str::upper($type));
        }

        Log::debug($category);
        return $category;
    }
}
