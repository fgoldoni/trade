<?php

namespace Core\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Videos\Models\Video;

trait MorphManyVideo
{
    public function reports(): MorphMany
    {
        return $this->morphMany(Video::class, 'videoable');
    }
}
