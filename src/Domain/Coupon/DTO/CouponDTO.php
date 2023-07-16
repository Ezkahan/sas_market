<?php

namespace Domain\Coupon\DTO;

use DateTime;

class CouponDTO
{
    public function __construct(
        public readonly object $title,
        public readonly int $discount,
        public readonly string $discount_type,
        public readonly string $expires_at,
        public readonly string $type,
    ) {
    }

    public function toArray()
    {
        return [
            'title' => [
                'tm' => $this->title->tm,
                'ru' => $this->title->ru,
            ],
            'discount'      => $this->discount,
            'discount_type' => $this->discount_type,
            'expires_at'    => $this->expires_at,
            'type'          => $this->type,
        ];
    }
}
