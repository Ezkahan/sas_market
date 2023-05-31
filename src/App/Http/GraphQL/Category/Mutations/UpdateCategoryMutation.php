<?php

namespace App\Http\GraphQL\Category\Mutations;

use Domain\Category\Actions\UpdateCategoryAction;
use Illuminate\Support\Arr;

final class UpdateCategoryMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = Arr::only($args, ["name", "description", "parent_id"]);

        return app(UpdateCategoryAction::class)->run($data, $args["id"]);
    }
}
