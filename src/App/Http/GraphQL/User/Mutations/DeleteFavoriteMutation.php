<?php

namespace App\Http\GraphQL\User\Mutations;

final class DeleteFavoriteMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        return $user->favorites()->where('id', '=', $args["product_id"])->delete();
    }
}
