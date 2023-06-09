<?php

namespace App\Http\GraphQL\Documentation\Mutations;

use Domain\Documentation\DTO\DocumentationDTO;

final class AddDocumentationMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new DocumentationDTO(
            $args['title'],
            $args['text'],
        );

        return app(AddDocumentationAction::class)->run($data);
    }
}
