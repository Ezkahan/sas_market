<?php

namespace App\Http\GraphQL\Page\Mutations;

use Domain\Page\Models\Page;

final class DeletePageMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Page::where('id', '=', $args["id"])->delete();
    }
}
