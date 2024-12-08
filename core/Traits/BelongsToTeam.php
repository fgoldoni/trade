<?php

namespace Core\Traits;

use App\Models\Team;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToTeam
{
    public function team(): belongsTo
    {
        return $this->belongsTo(Team::class)->withDefault();
    }
}
