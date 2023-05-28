<?php

namespace App\Http\GraphQL\Banner\Mutations;

use Domain\Banner\Actions\DeleteAction;

final class DeleteBannerMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];
        if ($id) {
            return app(DeleteAction::class)->run($id);
        }
        return;
    }
}
