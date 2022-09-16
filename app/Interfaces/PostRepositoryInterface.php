<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function list();
    public function findById($postId);
    public function create(array $details);
    public function update($postId, array $details);
    public function delete($postId);
}
