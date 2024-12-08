<?php

namespace Core\Traits;

use Spatie\Translatable\HasTranslations;

trait HasTranslationsTrait
{
    use HasTranslations;

    public function toArray(): array
    {
        $attributes = parent::toArray();

        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation(
                $field,
                session(config('app.system.sessions.keys.locale'), app()->getLocale())
            );
        }

        return $attributes;
    }


}
