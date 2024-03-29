<?php

namespace Domain\Category\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function save(User $user)
    {
        return true;
    }

    public function delete(User $user)
    {
        return true;
    }
}
