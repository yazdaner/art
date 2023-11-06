<?php

namespace Yazdan\Course\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class CoursePolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        return  $user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_COURSE);
    }
}

