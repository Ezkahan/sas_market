<?php

namespace Domain\Brand\Actions;

use Domain\Brand\BrandRepository;

class AddBrandAction {
    protected BrandRepository $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->save($data);
        }
        catch (Exception $exception) {
            throw new Exception("Error not saved");
        }
    }
}
