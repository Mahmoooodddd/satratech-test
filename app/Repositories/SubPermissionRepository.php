<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 11/21/20
 * Time: 8:20 PM
 */

namespace App\Repositories;


use App\SubPermission;

class SubPermissionRepository
{
    protected $subPermissions;

    public function __construct(SubPermission $subPermissions)
    {
        $this->subPermissions = $subPermissions;
    }

    public function getAdminUserSubPermissionsByIds($name, $permissionId)
    {
        $subPermissions = SubPermission::all();

        if ($name != "") {
            $subPermissions->where('subPermissions.name', 'like', '%' . $name . '%');
        };

        if ($permissionId != "") {
            $subPermissions->where('permissions.description', 'like', '%' . $permissionId . '%');
        };
        return $subPermissions;
    }
}
