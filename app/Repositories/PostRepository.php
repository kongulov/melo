<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{

    public function list()
    {
        return Post::all();
    }

    public function findById($postId)
    {
        return Post::query()->findOrFail($postId);
    }

    public function create(array $details)
    {
        $details['user_id'] = auth()->id();

        return Post::create($details);
    }

    public function update($postId, array $details)
    {
        return Post::query()->where('id', $postId)->update($details);
    }

    public function delete($postId)
    {
        return Post::query()->where('id', $postId)->where('user_id', auth()->id())->delete();
    }
}
