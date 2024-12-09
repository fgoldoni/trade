<?php

namespace App\View\Components;

use App\Http\Middleware\EnsureTeamIsValidMiddleware;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Translations extends Component
{
    public function render()
    {
        $locale = app()->getLocale();

        $translations = Cache::rememberForever("translations_$locale", function () use ($locale) {
            $phpTranslations = [];
            $jsonTranslations = [];

            if (File::exists(lang_path("$locale"))) {
                $phpTranslations = collect(File::allFiles(lang_path("$locale")))
                    ->filter(fn ($file) => $file->getExtension() === 'php')->flatMap(fn ($file) => Arr::dot(File::getRequire($file->getRealPath())))->toArray();
            }

            if (File::exists(lang_path("$locale.json"))) {
                $jsonTranslations = json_decode(File::get(lang_path("$locale.json")), true, 512, JSON_THROW_ON_ERROR);
            }



            return array_merge($phpTranslations, $jsonTranslations);
        });

        return view('components.translations', [
            'translations' => $translations,
        ]);
    }
}
