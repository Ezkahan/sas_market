<?php

namespace App\Http\GraphQL\Category\Mutations;

use Domain\Category\Actions\AddCategoryAction;
use Domain\Category\DTO\CategoryDTO;

final class AddCategoryMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new CategoryDTO(
            $args['name'],
            $args['logo'],
            $args['description'],
            $args['parent_id'],
        );

        return app(AddCategoryAction::class)->run($data);
    }
}
