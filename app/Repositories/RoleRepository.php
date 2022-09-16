<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

    public function list()
    {
        return Role::all();
    }

    public function findById($roleId)
    {
        return Role::findById($roleId);
    }

    public function create(array $details)
    {
        return Role::create($details);
    }

    public function update($roleId, array $details)
    {
        return Role::query()->where('id', $roleId)->update($details);
    }

    public function delete($roleId)
    {
        return Role::query()->where('id', $roleId)->delete();
    }
}
