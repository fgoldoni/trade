<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    public static $model = \Modules\Products\Models\Product::class;

    public static $title = 'name';

    public static $clickAction = 'edit';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'price',
    ];


    #[\Override]
    public static function redirectAfterCreate(NovaRequest $request, $resource): string
    {
        return '/resources/' . static::uriKey();
    }

    #[\Override]
    public static function redirectAfterUpdate(NovaRequest $request, $resource): string
    {
        return '/resources/' . static::uriKey();
    }


    #[\Override]
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()
                ->hide()
                ->rules('required', 'max:254')
                ->creationRules('unique:products,id')
                ->updateRules('exists:products,id,{{resourceId}}'),


            Text::make('Name')
                ->sortable()
                ->showOnPreview()
                ->rules('required', 'max:254')
                ->creationRules('unique:products,name')
                ->updateRules('unique:products,name,{{resourceId}}'),

            Boolean::make('Online')
                ->sortable()
                ->rules('nullable', 'boolean'),

            \Laravel\Nova\Fields\Currency::make('Price')
                ->min(0)
                ->default(fn() => 0)
                ->step(0.01)
                ->currency('XAF')
                ->rules('required', 'numeric')
                ->creationRules('unique:products,price')
                ->updateRules('unique:products,price,{{resourceId}}'),

            Number::make('Quantity')
                ->min(0)
                ->default(fn() => 0)
                ->step(1)
                ->rules('required', 'integer'),

            Number::make('Sold')
                ->default(fn() => 0)
                ->hide()
                ->showOnIndex(),

            Number::make('Left')->min(0)
                ->default(fn() => 0)
                ->hide()
                ->showOnIndex(),


            Number::make('Position')
                ->default(
                    fn() => \Modules\Products\Models\Product::max(
                            'position'
                        ) + 1
                )
                ->rules('required', 'integer'),


            Markdown::make('description')
                ->showOnPreview()
                ->rules('nullable'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    #[\Override]
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    #[\Override]
    public function filters(NovaRequest $request)
    {
        return [
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    #[\Override]
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    #[\Override]
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
