<?php

namespace Domain\Coupon\Actions;

use Domain\Coupon\CouponRepository;
use Domain\Coupon\DTO\CouponDTO;
use Exception;

class CreateCouponAction
{
    protected CouponRepository $repository;

    public function __construct(CouponRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(CouponDTO $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $exception) {
            throw new Exception("Error not created " . $exception->getMessage());
        }
    }
}
