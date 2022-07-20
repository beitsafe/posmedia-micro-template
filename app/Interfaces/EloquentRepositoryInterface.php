<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface EloquentRepositoryInterface
{
    public function paginate(array $attributes): LengthAwarePaginator;

    public function create(array $attributes): Model;

    public function find($id): ?Model;

    public function update($id, array $attributes): bool;

    public function delete($id);
}
