<?php

namespace App\Http\GraphQL\Product\Mutations;

use Domain\Product\Actions\DeleteProductAction;

final class DeleteProductMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];
        if ($id) {
            return app(DeleteProductAction::class)->run($id);
        }
        return;
    }
}
