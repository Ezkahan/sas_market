<?php

namespace App\Http\GraphQL\Documentation\Mutations;

use Domain\Documentation\Actions\DeleteDocumentationAction;

final class DeleteDocMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return app(DeleteDocumentationAction::class)->run($args["id"]);
    }
}
