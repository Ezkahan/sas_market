<?php

namespace App\Http\GraphQL\Page\Queries;

use Domain\Page\Models\Page;

final class GetPagesQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Page::paginate();
    }
}
