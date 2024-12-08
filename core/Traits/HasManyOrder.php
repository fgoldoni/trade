<?php

namespace Core\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Orders\App\Models\Order;

trait HasManyOrder
{
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
