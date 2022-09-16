<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function findById($userId);
}
