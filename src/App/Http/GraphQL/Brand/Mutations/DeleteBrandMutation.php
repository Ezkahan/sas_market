<?php

namespace App\Http\GraphQL\Brand\Mutations;

use Domain\Brand\Actions\DeleteBrandAction;

final class DeleteBrandMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];

        if ($id) {
            return app(DeleteBrandAction::class)->run($id);
        }

        return;
    }
}
