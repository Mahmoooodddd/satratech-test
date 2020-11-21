<?php

namespace App\Http\Controllers;

use App\Services\SubPermissionService;
use Illuminate\Http\Request;

class SubPermissionController extends CoreController
{
    protected $subPermissionService;


    public function __construct(SubPermissionService $subPermissionService)
    {
        $this->subPermissionService = $subPermissionService;
    }

    public function index(Request $request)
    {
        $name = $request->input('name');
        $permissionId = $request->input('permission_id');
        $result = $this->subPermissionService->getAdminUserSubPermissionList($name,$permissionId);
        return $this->response($result);

    }
    public function create(Request $request)
    {
        $name =$request->input('name');
        $permissionId =$request->input('permissionId');
        $result = $this->subPermissionService->createSubPermission($name,$permissionId);
        return $this->response($result);
    }

    public function edit(Request $request,$id)
    {
        $name = $request->get('name');
        $permissionId = $request->get('permission_id');
        $result = $this->subPermissionService->editSubPermission($name,$permissionId,$id);
        return $this->response($result);
    }

    public function delete($id)
    {
        $result = $this->subPermissionService->deletePermission($id);
        return $this->response($result);
    }
}
