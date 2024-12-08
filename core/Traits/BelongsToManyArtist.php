<?php

namespace Core\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Artists\Models\Artist;

trait BelongsToManyArtist
{
    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }
}
