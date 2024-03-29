<?php

namespace Domain\Brand\Actions;

use Domain\Brand\BrandRepository;
use Exception;

class DeleteBrandAction
{
    protected BrandRepository $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new Exception("Error not deleted");
        }
    }
}
