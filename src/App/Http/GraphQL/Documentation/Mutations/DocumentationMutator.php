<?php

namespace App\Http\GraphQL\Documentation\Mutations;

use Arr;
use Illuminate\Support\Facades\Auth;
use Domain\Documentation\Actions\AddAction;
use Domain\Documentation\Actions\DeleteAction;

class DocumentationMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function add($_, array $args)
    {
        // $data = Arr::only($args, ['name', 'logo', 'category_id']);
        // app(AddAction::class)->run($data);

        // return;
    }

    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function delete($_, array $args)
    {
        // $id = $args["id"];

        // if($id)
        // {
        //     app(DeleteAction::class)->run($id);
        // }
        // return;
    }
}
