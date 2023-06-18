<?php

namespace Domain\Banner\DTO;

class BannerDTO
{
    public function __construct(
        public readonly string $image,
        public readonly string $link,
        public readonly int $category_id,
        public readonly string $position,
    ) {
    }

    public function toArray()
    {
        return [
            'image'       => $this->image,
            'link'        => $this->link,
            'category_id' => $this->category_id,
            'position'    => $this->position,
        ];
    }
}
