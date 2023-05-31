<?php

namespace Domain\Banner\DTO;

use Domain\Banner\Enums\BannerEnum;

class BannerDTO
{
    public function __construct(
        public readonly string $link,
        public readonly int $category_id,
        public readonly BannerEnum $position,
    ) {
    }

    public function toArray()
    {
        return [
            'link'        => $this->link,
            'category_id' => $this->category_id,
            'position'    => $this->position,
        ];
    }
}
