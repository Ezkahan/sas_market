<?php

namespace App\Http\GraphQL\Support\Mutations;

use Domain\Support\Models\Support;

final class SupportWriteMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $support = Support::create([
            'title'   => $args["title"],
            'email'   => $args["email"],
            'subject' => $args["subject"],
        ]);

        return $support;
    }
}
