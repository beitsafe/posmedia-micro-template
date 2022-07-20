<?php

namespace App\Models;


class Option extends BaseModel
{
    protected $fillable = [
        'option_name', 'option_value'
    ];

    public array $searchable = ['option_name'];

    public static function fetch($name)
    {
        return self::where('option_name', $name)->first();
    }

    public static function modify($name, $value = null)
    {
        return self::where('option_name', $name)->update(['option_value' => $value]);
    }
}
