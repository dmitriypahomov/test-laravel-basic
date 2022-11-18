<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use function response;

class PostController extends Controller
{
    public function __construct(
        protected PostRepository $postRepository,
    ){}

    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(
            $this->postRepository->getAll()
        );
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        try {
            $this->postRepository->create(
                $request->only('title', 'body')
            );
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }

        return response()->json('Post Created', 201);
    }
}
