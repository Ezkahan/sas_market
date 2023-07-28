<?php

namespace Domain\Page\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
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
