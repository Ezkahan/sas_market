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
            $args['description'] ?? [],
            $args['parent_id'] ?? 0,
            $args['icon'] ?? null,
            $args['image'] ?? null,
        );

        return app(AddCategoryAction::class)->run($data);
    }
}
