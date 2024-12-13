<?php

namespace Modules\Withdrawal\Models;

use Core\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Withdrawal extends Model
{
    use BelongsToUser;
    use SoftDeletes;
    protected $guarded = [];
}
