<?php

namespace App\Http\GraphQL\Product\Mutations;

use Domain\Product\Actions\AddProductAction;
use Domain\Product\DTO\ProductDTO;
use Domain\Product\Enums\DiscountTypeEnum;

final class AddProductMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new ProductDTO(
            $args['title'],
            $args['description'] ?? null,
            $args['code'],
            $args['brand_id'],
            $args['category_id'],
            $args['price'],
            $args['discount_type'] ?? DiscountTypeEnum::FIX_PRICE->value,
            $args['discount_amount'] ?? 0,
            $args['images'],
        );

        return app(AddProductAction::class)->run($data);
    }
}
