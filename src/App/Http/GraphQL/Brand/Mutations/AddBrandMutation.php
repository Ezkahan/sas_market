<?php

namespace App\Http\GraphQL\Brand\Mutations;

use Domain\Brand\Actions\AddBrandAction;
use Domain\Brand\DTO\BrandDTO;

final class AddBrandMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new BrandDTO(
            $args['name'],
            $args['logo'],
            $args['category_id'],
        );

        return app(AddBrandAction::class)->run($data);
    }
}
