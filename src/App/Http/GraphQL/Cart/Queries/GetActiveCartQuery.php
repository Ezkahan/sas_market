<?php

namespace App\Http\GraphQL\Cart\Queries;

use Illuminate\Support\Facades\Auth;

final class GetActiveCartQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (Auth::check()) {
            $user = auth()->user();
            return $user->getActiveCart();
        }
        return;
    }
}
