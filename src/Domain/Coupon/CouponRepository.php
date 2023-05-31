<?php

namespace Domain\Coupon;

use Domain\Coupon\DTO\CouponDTO;
use Domain\Coupon\Models\Coupon;

class CouponRepository
{
    protected Coupon $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function create(CouponDTO $data)
    {
        return $this->coupon->create($data->toArray());
    }

    public function delete(int $id): string
    {
        return $this->coupon->where('id', '=', $id)->delete();
    }
}
