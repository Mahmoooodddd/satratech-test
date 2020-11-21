<?php
/**
 * Created by PhpStorm.
 * User: mahmood
 * Date: 11/21/20
 * Time: 8:20 PM
 */

namespace App\Services;


use App\Repositories\SubPermissionRepository;
use App\SubPermission;
use App\Traits\ServiceResponseTrait;

class SubPermissionService
{
    use ServiceResponseTrait;
    protected $subPermissionRepository;

    public function __construct(SubPermissionRepository $subPermissionRepository)
    {
        $this->subPermissionRepository = $subPermissionRepository;
    }

    public function getAdminUserSubPermissionList($name, $permissionId)
    {
        $subPermissions = $this->subPermissionRepository->getAdminUserSubPermissionsByIds($name, $permissionId);
        $data = [];
        foreach ($subPermissions as $subPermission) {
            $data[] = [
                'name' => $subPermission->name,
                'permissionId' => $subPermission->permission->id,
            ];
        }
        return $this->success($data);

    }

    public function createSubPermission($name, $permissionId)
    {
        $subPermission = new SubPermission();
        $subPermission->name = $name;
        $subPermission->permission_id=$permissionId;
        $subPermission->save();
        return $this->success($subPermission);
    }

    public function editSubPermission($name, $permissionId, $id)
    {
        $subPermission = SubPermission::find($id);
        if (!$subPermission) {
            return $this->error(404,'subPermission Not Found');
        }
        $subPermission->name = $name;
        $subPermission->permission_id = $permissionId;
        $subPermission->save();
        return $this->success($subPermission);
    }

    public function deletePermission($id)
    {
        $subPermission = SubPermission::find($id);
        if (!$subPermission) {
            return $this->error(404,'subPermission Not Found');
        }
        $subPermission->delete();
        return $this->success([]);
    }
}
