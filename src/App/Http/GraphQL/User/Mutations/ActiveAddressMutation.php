<?php

namespace App\Http\GraphQL\User\Mutations;

final class ActiveAddressMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();

        // before activation set false all addresses
        $user->addresses->map(function ($address) {
            return $address->update(['active' => false]);
        });

        if ($user->addresses()->where('id', '=', $args['id'])->update(['active' => true])) {
            return 'success';
        }

        return 'error';
    }
}
