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
        return $user->favorites()->create([
            'product_id' => $args['product_id'],
        ]);
    }
}
