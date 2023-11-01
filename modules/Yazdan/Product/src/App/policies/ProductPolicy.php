<?php

namespace Yazdan\Product\App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\User\App\Models\User;

class ProductPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return  $user->hasPermissionTo(PermissionRepository::PERMISSION_MANAGE_PRODUCT);
    }
}

