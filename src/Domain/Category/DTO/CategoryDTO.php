<?php

namespace Domain\Category\DTO;

class CategoryDTO
{
    public function __construct(
        public readonly object $name,
        public readonly object $description,
        public readonly int $parent_id,
        public readonly string $icon,
        public readonly string $image,
    ) {
    }

    public function toArray()
    {
        return [
            'name' => [
                'tm' => $this->name->tm,
                'ru' => $this->name->ru,
            ],
            'description' => [
                'tm' => $this->description->tm ?? "",
                'ru' => $this->description->ru ?? "",
            ],
            'parent_id' => $this->parent_id,
            'icon' => $this->icon,
            'image' => $this->image,
        ];
    }
}
