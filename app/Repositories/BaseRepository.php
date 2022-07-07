<?php

namespace App\Repositories;

use App\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function update($id, array $attributes): bool
    {
        return $this->model->whereId($id)->update($attributes);
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }
}
