<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use Uuids;

    public $timestamps = true;
}
