<?php

namespace App\Http\GraphQL\Cart\Queries;

final class GetMyActiveOrdersQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        return $user->activeOrders();
    }
}
