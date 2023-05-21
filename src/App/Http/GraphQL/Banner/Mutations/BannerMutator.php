<?php

namespace App\Http\GraphQL\Banner\Mutations;

use Arr;
use Illuminate\Support\Facades\Auth;
use Domain\Banner\Actions\DeleteAction;

class BannerMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function add($_, array $args)
    {
        $data = Arr::only($args, ['image', 'link', 'category_id', 'position']);
        app(SaveAction::class)->run($data);

        return;
    }

    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function delete($_, array $args)
    {
        $id = $args["id"];

        if($id)
        {
            app(DeleteAction::class)->run($id);
        }
        return;
    }
}
