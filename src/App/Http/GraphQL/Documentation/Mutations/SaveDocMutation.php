<?php

namespace App\Http\GraphQL\Documentation\Mutations;

use Domain\Documentation\Actions\SaveDocAction;
use Domain\Documentation\DTO\DocumentationDTO;

final class SaveDocMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = new DocumentationDTO(
            $args['id'] ?? null,
            $args['title'],
            $args['text'],
        );

        return app(SaveDocAction::class)->run($data);
    }
}
