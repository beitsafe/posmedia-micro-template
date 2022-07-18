<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use Uuids, SoftDeletes;

    public $timestamps = true;

    protected $perPage = 10;

    protected $dates = ['deleted_at'];
}
