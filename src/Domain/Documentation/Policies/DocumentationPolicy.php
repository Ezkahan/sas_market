<?php

namespace Domain\Documentation\Policies;

use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentationPolicy
{
    use HandlesAuthorization;

    public function add(User $user)
    {
        return true;
    }

    public function delete(User $user)
    {
        return true;
    }
}
