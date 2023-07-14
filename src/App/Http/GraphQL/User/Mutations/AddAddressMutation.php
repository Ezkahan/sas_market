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
        $address = $user->addresses()->create([
            'address' => $args['address'],
        ]);

        if ($address) {
            return $address;
        }

        return 'error';
    }
}
