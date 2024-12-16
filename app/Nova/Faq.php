<?php

namespace App\Nova;


use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Faq extends Resource
{
    public static $model = \Modules\Faqs\Models\Faq::class;


    public static $title = 'id';

    public static $clickAction = 'edit';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'question',
        'answer',
    ];

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
                ->showOnPreview()
                ->hide()
                ->rules('required', 'max:254')
                ->creationRules('unique:faqs,id')
                ->updateRules('exists:faqs,id,{{resourceId}}'),

            Markdown::make('question')
                ->sortable()
                ->showOnPreview()
                ->rules('required'),

            Markdown::make('answer')
                ->sortable()
                ->showOnPreview()
                ->rules('required'),

            Boolean::make('Online')
                ->sortable()
                ->rules('nullable', 'boolean'),



            Number::make('Position')
                ->default(
                    fn () => Faq::newModel()->max( 'position' ) + 1
                )
                ->rules('required', 'integer'),


            BelongsTo::make('User')
                ->nullable()
                ->hide()
                ->showOnIndex(),


            Text::make('user_id')
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    if ($request->isMethod('post')) {
                        $model->{$attribute} = auth()->user()->id;
                    }
                })->hideFromIndex()->hide(),
        ];
    }


    #[\Override]
    public function cards(NovaRequest $request)
    {
        return [];
    }


    #[\Override]
    public function filters(NovaRequest $request)
    {
        return [];
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
