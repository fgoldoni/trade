<?php

namespace Modules\Products\Repositories\Contracts;

use Modules\Products\Models\Product;

interface ProductsRepository
{
    public function updateQuantity(string $id, int $quantity): Product;
}
