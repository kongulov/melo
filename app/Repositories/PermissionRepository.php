<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionRepository implements PermissionRepositoryInterface
{

    public function list()
    {
        return Permission::all();
    }

    public function findById($permissionId)
    {
        return Permission::findById($permissionId);
    }

    public function create(array $details)
    {
        return Permission::create($details);
    }

    public function update($permissionId, array $details)
    {
        $this->refreshCache();

        return Permission::query()->where('id', $permissionId)->update($details);
    }

    public function delete($permissionId)
    {
        $this->refreshCache();

        return Permission::query()->where('id', $permissionId)->delete();
    }

    public function refreshCache()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
