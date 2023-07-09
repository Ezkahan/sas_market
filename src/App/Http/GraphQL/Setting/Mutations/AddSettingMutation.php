<?php

namespace App\Http\GraphQL\Setting\Mutations;

use Domain\Setting\Actions\AddSettingAction;

final class AddSettingMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return app(AddSettingAction::class)->run($args);
    }
}
