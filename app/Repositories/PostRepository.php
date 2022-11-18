<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class PostRepository
{
    public function __construct(
        private Post $model,
    ){}

    public function getAll(): Collection
    {
        return $this->model
            ->with('creator')
            ->get();
    }

    public function create(array $payload): void
    {
        $payload['created_by'] = auth()->user()->id;
        $payload['slug'] = Str::slug($payload['title']);

        $this->model->create($payload);
    }
}
