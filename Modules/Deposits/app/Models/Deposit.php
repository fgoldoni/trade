<?php

namespace Modules\Deposits\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Deposits\Database\Factories\DepositFactory;

class Deposit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): DepositFactory
    // {
    //     // return DepositFactory::new();
    // }
}
