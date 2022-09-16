<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostCreateRequest;
use App\Http\Requests\Api\PostUpdateRequest;
use App\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function list()
    {
        return response()->json([
            'success' => true,
            'data' => $this->postRepository->list(),
        ]);
    }

    public function findById(int $postId)
    {
        return response()->json([
            'success' => true,
            'data' => $this->postRepository->findById($postId),
        ]);
    }

    public function create(PostCreateRequest $request)
    {
        $this->checkPermission('post.create');

        return response()->json([
            'success' => true,
            'data' => $this->postRepository->create($request->validated()),
        ]);
    }

    public function update(PostUpdateRequest $request, int $postId)
    {
        $this->checkPermission('post.update');

        $this->postRepository->update($postId, $request->validated());

        return response()->json([
            'success' => true,
            'data' => $this->postRepository->findById($postId),
        ]);
    }

    public function delete(int $postId)
    {
        $this->checkPermission('post.delete');

        $this->postRepository->delete($postId);

        return response()->json([
            'success' => true,
        ]);
    }


}
