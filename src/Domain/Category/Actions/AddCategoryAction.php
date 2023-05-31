<?php

namespace Domain\Category\Actions;

use Domain\Category\CategoryRepository;
use Exception;

class AddCategoryAction
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->save($data);
        } catch (Exception $exception) {
            throw new Exception("Error not saved " . $exception->getMessage());
        }
    }
}
