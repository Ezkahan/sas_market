<?php

namespace Domain\Product\Actions;

use Domain\Product\ProductRepository;
use Domain\Product\DTO\ProductDTO;
use Exception;

class AddProductAction
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(ProductDTO $data)
    {
        try {
            return $this->repository->save($data);
        } catch (Exception $exception) {
            throw new Exception("Error not saved " . $exception->getMessage());
        }
    }
}
