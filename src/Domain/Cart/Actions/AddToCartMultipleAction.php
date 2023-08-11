<?php

namespace Domain\Cart\Actions;

use Domain\Cart\CartRepository;
use Exception;

class AddToCartMultipleAction
{
    protected CartRepository $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->addToCartMultiple($data);
        } catch (Exception $exception) {
            throw new Exception("Error not added " . $exception->getMessage());
        }
    }
}
