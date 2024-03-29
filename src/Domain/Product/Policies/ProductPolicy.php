<?php

namespace Domain\Product\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function add(User $user)
    {
        return true;
    }

    public function update(User $user)
    {
        return true;
    }

    public function delete(User $user)
    {
        return true;
    }
}
