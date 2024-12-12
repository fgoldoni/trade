<?php

namespace Modules\Withdrawal\Repositories\Eloquent;

use Goldoni\CoreRepositories\Repositories\RepositoryAbstract;
use Modules\Withdrawal\Models\Recipient;
use Modules\Withdrawal\Repositories\Contracts\RecipientsRepository;

class EloquentRecipientsRepository extends RepositoryAbstract implements RecipientsRepository
{
    public function model(): string
    {
        return Recipient::class;
    }
}
