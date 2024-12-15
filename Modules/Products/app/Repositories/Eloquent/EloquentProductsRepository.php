<?php

namespace Modules\Products\Repositories\Eloquent;

use Goldoni\CoreRepositories\Repositories\RepositoryAbstract;
use Modules\Products\Models\Product;
use Modules\Products\Repositories\Contracts\ProductsRepository;

class EloquentProductsRepository extends RepositoryAbstract implements ProductsRepository
{
    #[\Override]
    public function model(): string
    {
        return Product::class;
    }

    #[\Override]
    public function updateQuantity(string $id, int $quantity): Product
    {
        $product = Product::withoutGlobalScopes()->find($id);
        $product->sold = (int)$product->sold + $quantity;
        $product->save();

        return $product;
    }
}
