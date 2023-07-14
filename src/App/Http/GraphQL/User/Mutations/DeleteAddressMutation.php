<?php

namespace App\Http\GraphQL\User\Mutations;

final class DeleteAddressMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = auth()->user();
        if ($user->addresses()->where('id', '=', $args['id'])->delete()) {
            return 'success';
        }

        return 'error';
    }
}
