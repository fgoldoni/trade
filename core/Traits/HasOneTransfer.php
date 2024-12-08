<?php

namespace Core\Traits;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Teams\Models\Transfer;

trait HasOneTransfer
{
    public function transfer(): HasOne
    {
        return $this->hasOne(Transfer::class)->withDefault();
    }
}
