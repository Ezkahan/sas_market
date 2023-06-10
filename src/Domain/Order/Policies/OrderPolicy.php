<?php

namespace Domain\Order\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function get(User $user)
    {
        return true;
    }

    public function delete(User $user)
    {
        return true;
    }
}
