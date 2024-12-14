<?php

namespace Modules\Faqs\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Faqs\Repositories\Contracts\FaqsRepository;
use Modules\Faqs\Repositories\Eloquent\EloquentFaqsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected bool $defer = false;

    public function boot(): void
    {
        $this->app->bind(FaqsRepository::class, EloquentFaqsRepository::class);
    }
}
