<?php

namespace App\Http\GraphQL\Coupon\Mutations;

use Arr;
use Illuminate\Support\Facades\Auth;
use Domain\Coupon\Actions\AddAction;
use Domain\Coupon\Actions\DeleteAction;

class CouponMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function create($_, array $args)
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
