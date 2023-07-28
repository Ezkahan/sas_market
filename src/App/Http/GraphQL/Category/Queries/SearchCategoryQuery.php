<?php

namespace App\Http\GraphQL\Category\Queries;

use Domain\Category\Models\Category;

final class SearchCategoryQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $searchTerm = $args["name"];
        $results = Category::where('name', 'LIKE', "%{$searchTerm}%")->get();
        return $results;
    }
}
