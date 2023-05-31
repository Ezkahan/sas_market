<?php

namespace Domain\Category\Actions;

use Domain\Category\CategoryRepository;
use Exception;

class DeleteCategoryAction
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new Exception("Error not deleted " . $exception->getMessage());
        }
    }
}
