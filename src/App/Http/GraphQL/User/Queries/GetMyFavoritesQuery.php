<?php

namespace App\Http\GraphQL\User\Queries;

use Illuminate\Support\Facades\Log;

final class GetMyFavoritesQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        Log::info($user->favorites);
        return $user->favorites;
    }
}
