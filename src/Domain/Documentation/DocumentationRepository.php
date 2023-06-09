<?php

namespace Domain\Documentation;

use Domain\Documentation\DTO\DocumentationDTO;
use Domain\Documentation\Models\Documentation;

class DocumentationRepository
{
    protected Documentation $model;

    public function __construct(Documentation $documentation)
    {
        $this->model = $documentation;
    }

    public function create(DocumentationDTO $data)
    {
        return $this->model->create($data->toArray());
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
