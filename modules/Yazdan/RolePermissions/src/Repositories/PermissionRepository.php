<?php

namespace Yazdan\RolePermissions\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository
{

    const PERMISSION_MANAGE_CATEGORIES = 'manage categories';
    const PERMISSION_MANAGE_BLOG = 'manage blog';
    const PERMISSION_MANAGE_USERS = 'manage users';
    const PERMISSION_MANAGE_ROLE_PERMISSIONS = 'manage role permissions';
    const PERMISSION_MANAGE_PAYMENTS = 'manage payments';
    const PERMISSION_MANAGE_DISCOUNT = 'manage discounts';
    const PERMISSION_MANAGE_COMMENTS = "manage comments";
    const PERMISSION_MANAGE_DASHBOARD = "manage dashboard";
    const PERMISSION_MANAGE_SLIDER = 'manage slider';
    const PERMISSION_MANAGE_SETTING = 'manage setting';
    const PERMISSION_MANAGE_CONTACT = 'manage contact';
    const PERMISSION_MANAGE_ABOUT = 'manage about';
    const PERMISSION_MANAGE_PRODUCT = 'manage product';
    const PERMISSION_MANAGE_COURSE = 'manage course';
    const PERMISSION_MANAGE_DELIVERY = 'manage delivery';
    const PERMISSION_MANAGE_ORDER = 'manage order';
    const PERMISSION_MANAGE_CUSTOMER_ORDER = 'manage customer order';

    static $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_MANAGE_BLOG,
        self::PERMISSION_MANAGE_CATEGORIES,
        self::PERMISSION_MANAGE_ROLE_PERMISSIONS,
        self::PERMISSION_MANAGE_USERS,
        self::PERMISSION_MANAGE_PAYMENTS,
        self::PERMISSION_MANAGE_DISCOUNT,
        self::PERMISSION_MANAGE_COMMENTS,
        self::PERMISSION_MANAGE_DASHBOARD,
        self::PERMISSION_MANAGE_SLIDER,
        self::PERMISSION_MANAGE_SETTING,
        self::PERMISSION_MANAGE_CONTACT,
        self::PERMISSION_MANAGE_ABOUT,
        self::PERMISSION_MANAGE_PRODUCT,
        self::PERMISSION_MANAGE_COURSE,
        self::PERMISSION_MANAGE_DELIVERY,
        self::PERMISSION_MANAGE_ORDER,
        self::PERMISSION_MANAGE_CUSTOMER_ORDER,
    ];

    const PERMISSION_SUPER_ADMIN = 'super admin';


    public static function getAll()
    {
        return Permission::all();
    }
}
