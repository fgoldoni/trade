<?php

namespace Modules\Faqs\Models;

use Core\Traits\BelongsToUser;
use Core\Traits\LogsActivityTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Faqs\Builders\FaqBuilder;

// use Modules\Faqs\Database\Factories\FaqFactory;

class Faq extends Model
{
    use BelongsToUser;
    use SoftDeletes;
    use LogsActivityTrait;

    protected $guarded = [];

    protected $casts = [
        'online' => 'boolean',
    ];
}
