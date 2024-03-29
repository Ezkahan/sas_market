<?php

namespace App\Http\GraphQL\Banner\Mutations;

use Domain\Banner\Actions\SaveBannerAction;
use Domain\Banner\DTO\BannerDTO;

final class AddBannerMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new BannerDTO(
            $args['image'],
            $args['link'],
            $args['category_id'] ?? null,
            $args['position'],
            $args['type'],
        );

        return app(SaveBannerAction::class)->run($data);
    }
}
