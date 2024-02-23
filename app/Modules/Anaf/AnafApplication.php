<?php

declare(strict_types=1);

namespace App\Modules\Anaf;

class AnafApplication
{
    public static $anafApplicationModel = 'App\\Modules\\Anaf\\Models\\AnafApplication';

    public static function anafApplicationModel(): string
    {
        return static::$anafApplicationModel;
    }

    public static function newAnafApplicationModel()
    {
        $model = static::anafApplicationModel();

        return new $model;
    }
}
