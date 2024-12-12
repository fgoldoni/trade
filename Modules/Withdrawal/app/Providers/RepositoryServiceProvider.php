<?php

namespace Modules\Withdrawal\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Withdrawal\Repositories\Contracts\RecipientsRepository;
use Modules\Withdrawal\Repositories\Eloquent\EloquentRecipientsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected bool $defer = false;

    public function boot(): void
    {
        $this->app->bind(RecipientsRepository::class, EloquentRecipientsRepository::class);
    }
}
