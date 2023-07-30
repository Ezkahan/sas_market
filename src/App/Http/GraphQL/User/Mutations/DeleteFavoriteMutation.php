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
        $user->favorites()->where('product_id', '=', $args["product_id"])->delete();
        return $user->favorites;
    }
}
