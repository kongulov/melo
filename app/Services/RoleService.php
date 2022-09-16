<?php

namespace App\Services;

use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class RoleService
{
    private RoleRepositoryInterface $roleRepository;
    private PermissionRepositoryInterface $permissionRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        PermissionRepositoryInterface $permissionRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->userRepository = $userRepository;
    }

    public function attachPermission(int $roleId, int $permissionId)
    {
        $role = $this->roleRepository->findById($roleId);
        $permission = $this->permissionRepository->findById($permissionId);

        return $permission->assignRole($role);
    }

    public function detachPermission(int $roleId, int $permissionId)
    {
        $role = $this->roleRepository->findById($roleId);
        $permission = $this->permissionRepository->findById($permissionId);

        return $permission->removeRole($role);
    }

    public function attachUser(int $roleId, int $userId)
    {
        $role = $this->roleRepository->findById($roleId);
        $user = $this->userRepository->findById($userId);

        return $user->assignRole($role);
    }

    public function detachUser(int $roleId, int $userId)
    {
        $role = $this->roleRepository->findById($roleId);
        $user = $this->userRepository->findById($userId);

        return $user->removeRole($role);
    }
}
