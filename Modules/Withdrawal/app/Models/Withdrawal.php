<?php

namespace Modules\Withdrawal\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Withdrawal extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}
