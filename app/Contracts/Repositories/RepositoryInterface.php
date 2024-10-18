<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryInterface
{
    public function all(): Collection;
    public function findById($id): ?Model;
    public function create(array $attributes): Model;
    public function update($id, array $attributes): bool;
    public function delete($id): bool;
    public function paginate($perPage = 15): LengthAwarePaginator;
    public function where($column, $operator, $value);
    public function with($relations);
}
