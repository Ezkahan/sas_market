<?php

namespace Domain\Category\DTO;

class CategoryDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $logo,
        public readonly int $category_id,
    ) {
    }

    public function toArray()
    {
        return [
            'name'        => $this->name,
            'logo'        => $this->logo,
            'category_id' => $this->category_id,
        ];
    }
}
