<?php

namespace Yazdan\DigitalOrder\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class DigitalOrderPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        if($user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_ORDER)) return true;
    }


}
