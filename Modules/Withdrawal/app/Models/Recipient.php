<?php

namespace Modules\Withdrawal\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipient extends Model
{
    protected $guarded = [];

    public static function empty(): array
    {
        return [
            'name' => null,
            'channel' => 'cm.mobile',
            'number' => null,
            'phone' => null,
            'email' => null,
            'country' => 'CM',
            'description' => null,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
