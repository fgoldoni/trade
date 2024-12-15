<?php

namespace Core\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Products\Models\Product;
use Modules\Products\Models\ProductUser;

trait BelongsToManyProduct
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->using(ProductUser::class)
            ->withPivot('id', 'quantity', 'max', 'revenue')
            ->withTimestamps();
    }
}
