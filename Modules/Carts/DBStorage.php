<?php

namespace Modules\Carts;

use Darryldecode\Cart\CartCollection;
use Modules\Carts\Models\Cart;

class DBStorage
{
    public function get($key)
    {
        if ($this->has($key)) {
            return new CartCollection(Cart::find($key)->cart_data);
        }

        return [];
    }

    public function has($key)
    {
        return Cart::find($key);
    }

    public function put($key, $value)
    {
        if ($row = Cart::find($key)) {
            $row->cart_data = $value;
            $row->save();
        } else {
            Cart::create([
                'id' => $key,
                'cart_data' => $value,
            ]);
        }
    }
}
