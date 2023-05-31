<?php

namespace Domain\Category\Actions;

use Domain\Coupon\CouponRepository;
use Exception;

class DeleteCouponAction
{
    protected CouponRepository $repository;

    public function __construct(CouponRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new Exception("Error not deleted " . $exception->getMessage());
        }
    }
}
