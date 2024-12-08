<?php

namespace Core\Traits;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Teams\Models\NotchPay;

trait HasOneNotchPay
{
    public function notchPay(): HasOne
    {
        return $this->hasOne(NotchPay::class)->withDefault();
    }
}
