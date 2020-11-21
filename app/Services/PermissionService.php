<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 11/21/20
 * Time: 3:31 PM
 */

namespace App\Services;


use App\Permission;
use App\Repositories\PermissionRepository;
use App\Traits\ServiceResponseTrait;
use Illuminate\Http\Request;

class PermissionService
{
    use ServiceResponseTrait;
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getAdminUserPermissionList($name, $description)
    {
        $permissions = $this->permissionRepository->getAdminUserPermissionsByPagination($name, $description);
        $data = [];
        foreach ($permissions as $permission) {
            $data[] = [
                'name' => $permission->name,
                'description' => $permission->description,
            ];
        }

        return $this->success($data);
    }

    public function createPermission($name, $description)
    {
        $permission = new Permission();
        $permission->name = $name;
        $permission->description = $description;
        $permission->save();

        return $this->success($permission);
    }

    public function editPermission($name, $description, $id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            return $this->error(404,'Permission Not Found');
        }
        $permission->name = $name;
        $permission->description = $description;
        $permission->save();
        return $this->success($permission);
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            return $this->error(404,'Permission Not Found');
        }
        $permission->delete();
        return $this->success([]);
    }


}
