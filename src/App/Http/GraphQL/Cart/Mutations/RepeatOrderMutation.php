<?php

namespace App\Http\GraphQL\Cart\Mutations;

use Domain\Cart\CartRepository;

final class RepeatOrderMutation
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
        return $this->repository->repeatOrder($args["id"]);
    }
}
