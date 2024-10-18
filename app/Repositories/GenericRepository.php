<?php

namespace App\Repositories;

use App\Contracts\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class GenericRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes): bool
    {
        $record = $this->findById($id);
        if ($record) {
            return $record->update($attributes);
        }
        
        return false;
    }

    public function delete($id): bool
    {
        return $this->model->destroy($id) > 0;
    }

    public function paginate($perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function where($column, $operator, $value)
    {
        return $this->model->where($column, $operator, $value);
    }

    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
