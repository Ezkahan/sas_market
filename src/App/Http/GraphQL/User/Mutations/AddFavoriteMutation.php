<?php

namespace App\Http\GraphQL\User\Mutations;

final class AddFavoriteMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        if (!$user->favorites()->where('product_id', '=', $args["product_id"])->exists()) {
            $user->favorites()->create([
                'product_id' => $args['product_id'],
            ]);
        }

        return $user->favorites;
    }
}
