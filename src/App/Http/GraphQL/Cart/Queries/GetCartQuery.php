<?php

namespace App\Http\GraphQL\Cart\Queries;

use Illuminate\Support\Facades\Log;

final class GetCartQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        return $user->cart;
    }
}
