<?php

namespace App\Http\GraphQL\Brand\Mutations;

use Domain\Brand\Actions\SaveBrandAction;
use Domain\Brand\DTO\BrandDTO;

final class SaveBrandMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new BrandDTO(
            $args['id'] ?? null,
            $args['name'],
            $args['logo'] ?? null,
            $args['category_id'],
        );

        return app(SaveBrandAction::class)->run($data);
    }
}
