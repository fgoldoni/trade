<?php

namespace Modules\Products\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Products\Repositories\Contracts\ProductsRepository;
use Modules\Products\Repositories\Eloquent\EloquentProductsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected bool $defer = false;

    public function boot(): void
    {
        $this->app->bind(ProductsRepository::class, EloquentProductsRepository::class);
    }
}
