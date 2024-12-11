<?php

namespace Modules\Withdrawal\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Withdrawal\Database\Factories\WithdrawalFactory;

class Withdrawal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): WithdrawalFactory
    // {
    //     // return WithdrawalFactory::new();
    // }
}
