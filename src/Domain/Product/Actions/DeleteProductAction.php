<?php

namespace Domain\Product\Actions;

use Domain\Product\ProductRepository;
use Exception;

class DeleteProductAction
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new Exception("Error not deleted " . $exception->getMessage());
        }
    }
}
