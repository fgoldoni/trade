<?php

namespace Core\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Tickets\Models\Ticket;
use Modules\Withdrawal\Models\Withdrawal;

trait HasManyWithdrawal
{
    public function withdrawals(): HasMany
    {
        return $this->hasMany(Withdrawal::class);
    }
}
