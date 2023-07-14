<?php

namespace App\Http\GraphQL\User\Queries;

final class GetMyAddressesQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();

        return $user->addresses;
    }
}
