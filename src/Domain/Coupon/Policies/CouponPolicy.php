<?php

namespace Domain\Coupon\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouponPolicy
{
    use HandlesAuthorization;

    public function add(User $user)
    {
        return true;
    }

    public function confirm(User $user)
    {
        return true;
    }

    public function delete(User $user)
    {
        return true;
    }
}
