<?php

namespace App\Http\GraphQL\News\Mutations;

use Domain\News\Models\News;

final class DeleteNewsMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $id = $args["id"];

        $news = News::find($id);
        if ($news->delete()) {
            return 'success';
        }

        return 'error';
    }
}
