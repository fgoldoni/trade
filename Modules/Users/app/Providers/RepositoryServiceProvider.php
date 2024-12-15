<?php

namespace Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Users\Repositories\Contracts\UsersRepository;
use Modules\Users\Repositories\Eloquent\EloquentUsersRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected bool $defer = false;

    public function boot(): void
    {
        $this->app->bind(UsersRepository::class, EloquentUsersRepository::class);
    }
}
