<?php

namespace Domain\Coupon;

use Domain\Coupon\DTO\CouponDTO;
use Domain\Coupon\Models\Coupon;

class CouponRepository
{
    protected Coupon $model;

    public function __construct(Coupon $coupon)
    {
        $this->model = $coupon;
    }

    public function create(CouponDTO $data)
    {
        return $this->model->create($data->toArray());
    }

    public function delete(int $id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
