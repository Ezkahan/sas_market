<?php

namespace Domain\Category\Actions;

use Domain\Category\CategoryRepository;
use Exception;

class UpdateCategoryAction
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data, int $id)
    {
        try {
            return $this->repository->update($data, $id);
        } catch (Exception $exception) {
            throw new Exception("Error not updated " . $exception->getMessage());
        }
    }
}
