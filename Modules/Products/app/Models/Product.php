<?php

namespace Modules\Products\Models;


use Core\Traits\LogsActivityTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mattiasgeniar\Percentage\Percentage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use SoftDeletes;
    use LogsActivityTrait;
    use HasSlug;

    protected $guarded = [];

    protected $casts = [
        'online' => 'boolean',
    ];

    protected $appends = [
        'free',
        'left',
        'daily_income',
        'total',
    ];



    public function free(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price <= 0
        );
    }

    public function dailyIncome(): Attribute
    {
        return Attribute::make(
            get: fn () => Percentage::of(20, $this->price)
        );
    }

    public function total(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price * 90
        );
    }

    public function left(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->quantity - $this->sold
        );
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
