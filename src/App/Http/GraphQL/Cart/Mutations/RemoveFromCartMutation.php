<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\CartRepository;

final class RemoveFromCartMutation
{
    protected $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return $this->repository->removeFromCart($args["product_id"]);
    }
}
