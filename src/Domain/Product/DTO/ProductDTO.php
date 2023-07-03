<?php

namespace Domain\Product\DTO;

class ProductDTO
{
    public function __construct(
        public readonly object $title,
        public readonly object $description,
        public readonly string $code,
        public readonly int $brand_id,
        public readonly int $category_id,
        public readonly string $price,
        public readonly string $percent,
        public readonly mixed $images,
    ) {
    }

    public function toArray()
    {
        return [
            'title' => [
                'tm' => $this->title->tm,
                'ru' => $this->title->ru,
            ],
            'description' => [
                'tm' => $this->description->tm ?? "",
                'ru' => $this->description->ru ?? "",
            ],
            'code'        => $this->code,
            'brand_id'    => $this->brand_id,
            'category_id' => $this->category_id,
            'price'       => $this->price,
            'percent'     => $this->percent,
            'images'      => $this->images,
        ];
    }
}
