<?php

namespace Modules\Products\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductUser extends Pivot
{
    public $incrementing = true;
    protected $guarded = [];
    protected $table = 'product_user';

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['user', 'product'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
