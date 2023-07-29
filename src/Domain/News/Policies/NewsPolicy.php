<?php

namespace Domain\News\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
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
