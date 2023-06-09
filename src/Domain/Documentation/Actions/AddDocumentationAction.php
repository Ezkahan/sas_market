<?php

namespace Domain\Documentation\Actions;

use Domain\Documentation\DocumentationRepository;
use Domain\Documentation\DTO\DocumentationDTO;
use Exception;

class AddDocumentationAction
{
    protected DocumentationRepository $repository;

    public function __construct(DocumentationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(DocumentationDTO $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            throw new Exception("Error not added " . $exception->getMessage());
        }
    }
}
