<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function list();
    public function findById($roleId);
    public function create(array $details);
    public function update($roleId, array $details);
    public function delete($roleId);
}
