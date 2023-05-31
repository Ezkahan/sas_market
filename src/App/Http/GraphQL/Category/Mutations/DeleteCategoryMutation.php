<?php

namespace App\Http\GraphQL\Category\Mutations;

use Domain\Category\Actions\DeleteCategoryAction;

final class DeleteCategoryMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return app(DeleteCategoryAction::class)->run($args["id"]);
    }
}
