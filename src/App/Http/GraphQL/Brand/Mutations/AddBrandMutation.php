<?php

namespace App\Http\GraphQL\Brand\Mutations;

use Domain\Brand\Actions\AddAction;
use Illuminate\Support\Arr;

final class AddBrandMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = Arr::only($args, ['name', 'logo', 'category_id']);
        return app(AddAction::class)->run($data);
    }
}
