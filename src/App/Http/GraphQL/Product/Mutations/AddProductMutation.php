<?php

namespace App\Http\GraphQL\Product\Mutations;

use Domain\Product\Actions\AddProductAction;
use Domain\Product\DTO\ProductDTO;
use Illuminate\Support\Facades\Log;

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
            $args['description'],
            $args['code'],
            $args['brand_id'],
            $args['category_id'],
            $args['price'],
            $args['percent'],
            $args['images'],
        );

        return app(AddProductAction::class)->run($data);
    }
}
