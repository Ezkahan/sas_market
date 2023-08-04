<?php

namespace App\Http\GraphQL\News\Mutations;

use Domain\News\DTO\NewsDTO;
use Domain\News\Models\News;

final class SaveNewsMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = array_key_exists("id", $args) ? $args["id"] : null;

        $data = new NewsDTO(
            $args['id'] ?? null,
            $args['title'],
            $args['description'] ?? [],
            $args['image'] ?? null,
        );

        if ($id) {
            $news = News::find($id);
            $news->update($data->toArray());

            if ($data->image) {
                $news->deleteImage();
                $path = saveImage($args["image"], $args["title"]->tm, '/assets/images/news/');
                $news->update(['image_path' => $path]);
            }

            return $news;
        } else {
            $news = News::create($data->toArray());
        }

        return $news;
    }
}
