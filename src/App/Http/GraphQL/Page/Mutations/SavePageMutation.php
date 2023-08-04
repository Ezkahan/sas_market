<?php

namespace App\Http\GraphQL\Page\Mutations;

use Domain\Page\DTO\PageDTO;
use Domain\Page\Models\Page;

final class SavePageMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = array_key_exists("id", $args) ? $args["id"] : null;

        $data = new PageDTO(
            $args['id'] ?? null,
            $args['title'],
            $args['text'] ?? [],
            $args['position'],
            $args['image'] ?? null,
        );

        if ($id) {
            $page = Page::find($id);
            $page->update($data->toArray());
        } else {
            $page = Page::create($data->toArray());
        }

        if ($data->image) {
            $page->deleteImage();
            $path = saveImage($args["image"], $args["title"]->tm, '/assets/images/pages/');
            $page->update(['image_path' => $path]);
        }

        return $page;
    }
}
