<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface EloquentRepositoryInterface
{
    public function all(): LengthAwarePaginator;

    public function create(array $attributes): Model;

    public function find($id): ?Model;

    public function update($id, array $attributes): bool;

    public function delete($id);
}
