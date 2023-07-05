<?php

namespace Domain\Brand\Actions;

use Domain\Brand\BrandRepository;
use Domain\Brand\DTO\BrandDTO;
use Exception;

class SaveBrandAction
{
    protected BrandRepository $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(BrandDTO $data)
    {
        try {
            return $this->repository->save($data);
        } catch (Exception $exception) {
            throw new Exception("Error not saved " . $exception->getMessage());
        }
    }
}
