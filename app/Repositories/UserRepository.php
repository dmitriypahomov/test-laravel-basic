<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function __construct(
        protected User $model,
    ){}

    public function findByName(string $name): User
    {
        return $this->model
            ->select(['id', 'name', 'email'])
            ->where('name', $name)
            ->first();
    }

    public function create(array $data): User
    {
        return $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
