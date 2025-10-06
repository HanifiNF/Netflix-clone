<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DatabasePolicy
{
    use HandlesAuthorization;

    public function viewDatabase(User $user)
    {
        if ($user->admin == 1) {
            return true; // User is an admin, grant access
        } else {
            return false; // User is not an admin, deny access
        }
    }
}
