<?php

namespace App\Nova;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Http\Requests\NovaRequest;

class ProductUser
{
    public function __invoke(NovaRequest $request, Model $relatedModel): array
    {
        return [
            Number::make('Quantity')
                ->min(0)
                ->default(fn () =>0)
                ->step(1)
                ->rules('required', 'integer'),

            Number::make('Max')
                ->min(1)
                ->default(fn () => 90)
                ->step(1)
                ->rules('required', 'integer'),

            Number::make('Revenue')
                ->min(0)
                ->default(fn () => 0)
                ->step(1)
                ->rules('required', 'integer'),
        ];
    }
}
