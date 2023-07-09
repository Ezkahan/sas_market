<?php

namespace App\Http\GraphQL\Setting\Mutations;

use Domain\Setting\Actions\DeleteSettingAction;

final class DeleteSettingMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return app(DeleteSettingAction::class)->run($args['id']);
    }
}
