<?php

namespace App\Http\GraphQL\Page\Mutations;

use Domain\Page\Models\Page;

final class SavePageMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if ($args["id"]) {
            $page = Page::find($args["id"]);
            $page->update($args);
        } else {
            $page = Page::create($args);
        }

        return $page;
    }
}
