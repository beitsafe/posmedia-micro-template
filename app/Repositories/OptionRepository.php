<?php

namespace App\Repositories;

use App\Interfaces\OptionRepositoryInterface;
use App\Models\Option;
use Illuminate\Support\Collection;

class OptionRepository extends BaseRepository implements OptionRepositoryInterface
{
    public function __construct(Option $model)
    {
        parent::__construct($model);
    }

    public function getCustomRecords(): Collection
    {
        return $this->model->where('column',1)->get();
    }
}
