<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->isAdmin() || $user->isTeacher();
    }

    public function manage(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Course $course)
    {
        if ($user->isAdmin()) {
            return true;
        }else if ($user->isTeacher()) {
            return $user->id == $course->createdBy->id;
        }
    }
    
}
