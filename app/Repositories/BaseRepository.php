<?php

namespace App\Repositories;

use App\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements EloquentRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function paginate(array $attributes): LengthAwarePaginator
    {
        $search = $attributes['q'] ?? null;
        $per_page = $attributes['per_page'] ?? null;

        $query = $this->model->newQuery();
        $searchColumns = $this->model->searchable ?? $this->model->getFillable();

        $query->when($searchColumns && $search, function ($query) use ($search, $searchColumns) {
            $query->where(function ($q) use ($search, $searchColumns) {
                // Prepare search by all searchable columns
                array_map(function ($column) use ($q, $search) {
                    return $q->orWhere($column, 'LIKE', "%{$search}%");
                }, $searchColumns);
            });
        });

        return $query->paginate($per_page);
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
