<?php

namespace App\Http\GraphQL\Category\Mutations;

use Domain\Category\Actions\SaveCategoryAction;
use Domain\Category\DTO\CategoryDTO;

final class SaveCategoryMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new CategoryDTO(
            $args['id'],
            $args['name'],
            $args['description'] ?? [],
            $args['parent_id'] ?? 0,
            $args['icon'] ?? null,
            $args['image'] ?? null,
        );

        return app(SaveCategoryAction::class)->run($data);
    }
}
