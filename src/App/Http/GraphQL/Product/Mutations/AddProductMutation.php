<?php

namespace App\Http\GraphQL\Product\Mutations;

use Domain\Product\Actions\AddProductAction;
use Domain\Product\DTO\ProductDTO;

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
            $args['discount_type'],
            $args['discount_amount'],
            $args['images'],
        );

        return app(AddProductAction::class)->run($data);
    }
}
