<?php

namespace Domain\Documentation\Actions;

use Domain\Documentation\DocumentationRepository;
use Exception;

class DeleteDocAction
{
    protected DocumentationRepository $repository;

    public function __construct(DocumentationRepository $repository)
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
