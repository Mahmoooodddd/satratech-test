<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 11/21/20
 * Time: 3:30 PM
 */

namespace App\Repositories;


use App\Permission;

class PermissionRepository
{
    protected $permissions;

    public function __construct(Permission $permissions)
    {
        $this->permissions = $permissions;
    }

    public function getAdminUserPermissionsByPagination($name,$description)
    {
        $permissions = Permission::all();

        if ($name != "") {
            $permissions->where('permissions.name', 'like', '%' . $name . '%');
        };

        if ($description != "") {
            $permissions->where('permissions.description', 'like', '%' . $description . '%');
        };
        return $permissions;
    }
}
