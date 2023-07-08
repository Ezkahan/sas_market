<?php

namespace Domain\Cart\Actions;

use Domain\Brand\CartRepository;
use Domain\Cart\DTO\CartDTO;
use Exception;

class AddToCartAction
{
    protected CartRepository $repository;

    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(CartDTO $data)
    {
        try {
            return $this->repository->addToCart($data);
        } catch (Exception $exception) {
            throw new Exception("Error not added " . $exception->getMessage());
        }
    }
}
