<?php

namespace App\Http\GraphQL\Category\Mutations;

use Domain\Category\Actions\AddCategoryAction;

final class AddCategoryMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return app(AddCategoryAction::class)->run($args);
    }
}
