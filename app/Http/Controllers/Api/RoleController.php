<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RoleCreateRequest;
use App\Http\Requests\Api\RoleUpdateRequest;
use App\Interfaces\RoleRepositoryInterface;
use App\Services\RoleService;

class RoleController extends Controller
{
    private RoleRepositoryInterface $roleRepository;

    private RoleService $roleService;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        RoleService $roleService
    )
    {
        $this->roleRepository = $roleRepository;
        $this->roleService = $roleService;
    }

    public function list()
    {
        $this->checkPermission('role.list');

        return response()->json([
            'success' => true,
            'data' => $this->roleRepository->list(),
        ]);
    }

    public function findById(int $roleId)
    {
        $this->checkPermission('role.list');

        return response()->json([
            'success' => true,
            'data' => $this->roleRepository->findById($roleId),
        ]);
    }

    public function create(RoleCreateRequest $request)
    {
        $this->checkPermission('role.create');

        return response()->json([
            'success' => true,
            'data' => $this->roleRepository->create($request->validated()),
        ]);
    }

    public function update(RoleUpdateRequest $request, int $roleId)
    {
        $this->checkPermission('role.update');

        $this->roleRepository->update($roleId, $request->validated());

        return response()->json([
            'success' => true,
            'data' => $this->roleRepository->findById($roleId),
        ]);
    }

    public function delete(int $roleId)
    {
        $this->checkPermission('role.delete');

        $this->roleRepository->delete($roleId);

        return response()->json([
            'success' => true,
        ]);
    }

    public function attachPermission(int $roleId, int $permissionId)
    {
        $this->checkPermission('role.attach.permission');

        $this->roleService->attachPermission($roleId, $permissionId);

        return response()->json([
            'success' => true,
        ]);
    }

    public function detachPermission(int $roleId, int $permissionId)
    {
        $this->checkPermission('role.detach.permission');

        $this->roleService->detachPermission($roleId, $permissionId);

        return response()->json([
            'success' => true,
        ]);
    }

    public function attachUser(int $roleId, int $userId)
    {
        $this->checkPermission('role.attach.user');

        $this->roleService->attachUser($roleId, $userId);

        return response()->json([
            'success' => true,
        ]);
    }

    public function detachUser(int $roleId, int $userId)
    {
        $this->checkPermission('role.detach.user');

        $this->roleService->detachUser($roleId, $userId);

        return response()->json([
            'success' => true,
        ]);
    }





}
