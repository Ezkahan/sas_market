<?php

namespace App\Http\GraphQL\Banner\Mutations;

use Domain\Banner\Actions\SaveBannerAction;
use Illuminate\Support\Arr;

final class AddBannerMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = Arr::only($args, ['image', 'link', 'category_id', 'position']);
        return app(SaveBannerAction::class)->run($data);
    }
}
