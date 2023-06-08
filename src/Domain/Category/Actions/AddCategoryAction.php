<?php

namespace Domain\Category\Actions;

use Domain\Category\CategoryRepository;
use Domain\Category\DTO\CategoryDTO;
use Exception;

class AddCategoryAction
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(CategoryDTO $data)
    {
        try {
            return $this->repository->save($data);
        } catch (Exception $exception) {
            throw new Exception("Error not saved " . $exception->getMessage());
        }
    }
}
