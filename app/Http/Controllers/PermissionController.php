<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends CoreController
{
    protected $permissionService;


    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }


    public function index(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $result = $this->permissionService->getAdminUserPermissionList($name,$description);
        return $this->response($result);

    }

    public function create(Request $request)
    {
        $name =$request->input('name');
        $description =$request->input('description');
        $result = $this->permissionService->createPermission($name,$description);
        return $this->response($result);
    }

    public function edit(Request $request,$id)
    {
        $name = $request->get('name');
        $description = $request->get('description');
        $result = $this->permissionService->editPermission($name,$description,$id);
        return $this->response($result);
    }

    public function delete($id)
    {
        $result = $this->permissionService->deletePermission($id);
        return $this->response($result);
    }
}
