<?php

namespace Modules\Users\Repositories\Eloquent;

use App\Models\Team;
use App\Models\User;
use Goldoni\CoreProcess\Processes\Contracts\ModelPayloadInterface;
use Goldoni\CoreRepositories\Repositories\Criteria\Where;
use Goldoni\CoreRepositories\Repositories\Criteria\WhereHas;
use Goldoni\CoreRepositories\Repositories\Criteria\WhereNot;
use Goldoni\CoreRepositories\Repositories\Criteria\WithTrashed;
use Goldoni\CoreRepositories\Repositories\RepositoryAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Laravel\Sanctum\NewAccessToken;
use Modules\Teams\Enums\ColorEnum;
use Modules\Teams\Enums\DomainsEnum;
use Modules\Teams\Models\Klarna;
use Modules\Teams\Models\NotchPay;
use Modules\Teams\Models\Paypal;
use Modules\Teams\Models\Sofort;
use Modules\Teams\Models\Stripe;
use Modules\Teams\Models\Transfer;
use Modules\Users\Notifications\LoginLinkNotification;
use Modules\Users\Notifications\LoginModelNotification;
use Modules\Users\Notifications\WelcomeNotification;
use Modules\Users\Repositories\Contracts\UsersRepository;

class EloquentUsersRepository extends RepositoryAbstract implements UsersRepository
{
    public function model(): string
    {
        return User::class;
    }

}
