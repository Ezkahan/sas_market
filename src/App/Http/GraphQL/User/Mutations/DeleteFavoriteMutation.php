<?php

namespace App\Http\GraphQL\User\Mutations;

use Illuminate\Support\Facades\Log;

final class DeleteFavoriteMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        $user->favorites()->where('id', '=', $args["product_id"])->delete();

        Log::info($user->favorites);
        return $user->favorites;
    }
}
