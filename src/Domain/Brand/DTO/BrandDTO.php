<?php

namespace Domain\Brand\DTO;

use Illuminate\Http\UploadedFile;

class BrandDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly ?UploadedFile $logo,
        public readonly int $category_id,
    ) {
    }

    public function toArray()
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'logo'        => $this->logo,
            'category_id' => $this->category_id,
        ];
    }
}
