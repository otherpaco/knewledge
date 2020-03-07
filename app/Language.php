<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Language extends Model
{
    use Sushi;

    public function documents()
    {
        return $this->hasMany(Document::class, 'language_code', 'code');
    }

    public function getRows()
    {
        return collect(json_decode(file_get_contents($this->getPath()), true))
            ->map(function ($languageName, $code) {
                return ['code' => $code, 'name' => $languageName];
            })->values()->toArray();
    }

    protected function getPath()
    {
        $path = base_path('vendor/commerceguys/intl/resources/language/'
            . config('app.locale') . '.json');

        if (file_exists($path)) {
            return $path;
        }

        $fallbackPath = base_path('vendor/commerceguys/intl/resources/language/'
            . config('app.fallback_locale') . '.json');

        if (file_exists($fallbackPath)) {
            return $fallbackPath;
        }

        return base_path('vendor/commerceguys/intl/resources/language/en.json');
    }
}
