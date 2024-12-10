<?php

namespace Modules\Carts\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    protected $keyType = 'string';

    public function setCartDataAttribute($value)
    {
        $this->attributes['cart_data'] = serialize($value);
    }

    public function getCartDataAttribute($value)
    {
        return unserialize($value);
    }
}
