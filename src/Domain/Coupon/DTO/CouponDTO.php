<?php

namespace Domain\Coupon\DTO;

use DateTime;

class CouponDTO
{
    public function __construct(
        public readonly object $title,
        public readonly int $promo_price,
        public readonly DateTime $started_at,
        public readonly DateTime $ended_at,
    ) {
    }

    public function toArray()
    {
        return [
            'title' => [
                'tm' => $this->title->tm,
                'ru' => $this->title->ru,
            ],
            'promo_price' => $this->promo_price,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
        ];
    }
}
