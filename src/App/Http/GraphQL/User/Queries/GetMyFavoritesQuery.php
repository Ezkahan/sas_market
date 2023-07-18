<?php

namespace App\Http\GraphQL\User\Queries;

final class GetMyFavoritesQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        return $user->favorites;
    }
}
