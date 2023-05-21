<?php

namespace App\Http\GraphQL\Subscriber\Mutations;

use Illuminate\Support\Facades\Auth;

class SubscriberMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function subscribe($_, array $args)
    {
        return;
    }

    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function unsubscribe($_, array $args)
    {
        return;
    }
}
