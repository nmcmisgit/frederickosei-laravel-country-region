<?php

namespace FrederickOsei\LaravelCountryRegion\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel
{
    public $timestamps = false;

    public $incrementing = false;

    protected $guarded = [];

    protected $keyType = 'string';
}
