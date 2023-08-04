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

    public function save(DocumentationDTO $data)
    {
        if ($data->id) {
            $doc = $this->model->find($data->id);
            $doc->update($data->toArray());
        } else {
            $doc = $this->model->create($data->toArray());
        }

        return $doc;
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
