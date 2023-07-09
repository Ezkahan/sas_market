<?php

namespace App\Http\GraphQL\Category\Queries;

use Domain\Category\Models\Category;

final class GetMainCategoriesQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Category::mainCategories()->get();
    }
}
