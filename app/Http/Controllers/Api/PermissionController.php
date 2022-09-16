<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PermissionCreateRequest;
use App\Http\Requests\Api\PermissionUpdateRequest;
use App\Http\Requests\Api\RoleCreateRequest;
use App\Http\Requests\Api\RoleUpdateRequest;
use App\Interfaces\PermissionRepositoryInterface;

class PermissionController extends Controller
{
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function list()
    {
        $this->checkPermission('permission.list');

        return response()->json([
            'success' => true,
            'data' => $this->permissionRepository->list(),
        ]);
    }

    public function findById(int $permissionId)
    {
        $this->checkPermission('permission.list');

        return response()->json([
            'success' => true,
            'data' => $this->permissionRepository->findById($permissionId),
        ]);
    }

    public function create(PermissionCreateRequest $request)
    {
        $this->checkPermission('permission.create');

        return response()->json([
            'success' => true,
            'data' => $this->permissionRepository->create($request->validated()),
        ]);
    }

    public function update(PermissionUpdateRequest $request, int $permissionId)
    {
        $this->checkPermission('permission.update');

        $this->permissionRepository->update($permissionId, $request->validated());

        return response()->json([
            'success' => true,
            'data' => $this->permissionRepository->findById($permissionId),
        ]);
    }

    public function delete(int $permissionId)
    {
        $this->checkPermission('permission.delete');

        $this->permissionRepository->delete($permissionId);

        return response()->json([
            'success' => true,
        ]);
    }
}
