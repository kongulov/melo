<?php

namespace App\Interfaces;

interface PermissionRepositoryInterface
{
    public function list();
    public function findById($permissionId);
    public function create(array $details);
    public function update($permissionId, array $details);
    public function delete($permissionId);
}
