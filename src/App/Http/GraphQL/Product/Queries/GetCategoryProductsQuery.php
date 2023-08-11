<?php

namespace App\Http\GraphQL\Product\Queries;

use Carbon\Carbon;
use Domain\Category\Models\Category;
use Domain\Product\Models\Product;
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
        $category = Category::find($id);
        $products = Product::where('category_id', '=', $id);

        foreach ($types as $type) {
            if (Str::upper($type) == "NEW") {
                $products->whereDate('created_at', '>', Carbon::now()->subDays(10));
            }
            if (Str::upper($type) == "DISCOUNT") {
                $products->where('discount_amount', '>', 0);
            }
            if (Str::upper($type) == "SPECIALLY") {
                $products->where('specially', '=', true);
            }
        }

        foreach ($brands as $brand) {
            $products->where('brand_id', '=', $brand);
        }

        return [
            'id'              => $category->id,
            'name'            => $category->getTranslations('name'),
            'description'     => $category->getTranslations('description'),
            'icon_url'        => $category->icon_url,
            'image_url'       => $category->image_url,
            'parent_id'       => $category->parent_id,
            'products'        => $products->get(),
            'banners'         => $category->banners,
            'categories'      => $category->categories,
            'category_brands' => $category->category_brands,
        ];
    }
}
