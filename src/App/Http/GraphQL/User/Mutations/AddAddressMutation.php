<?php

namespace App\Http\GraphQL\User\Mutations;

final class AddAddressMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();

        if ($user->addresses()->count() == 0) {
            return $user->addresses()->create([
                'address' => $args['address'],
                'active' => true,
            ]);
        }

        return $user->addresses()->create([
            'address' => $args['address'],
        ]);
    }
}
