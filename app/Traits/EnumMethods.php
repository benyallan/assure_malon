<?php

namespace App\Traits;

use ReflectionClass;

trait EnumMethods
{
    public static function all(): array
    {
        $reflectionClass = new ReflectionClass(self::class);

        return array_values($reflectionClass->getConstants());
    }

    public static function options(): array
    {
        $reflectionClass = new ReflectionClass(self::class);

        $constants = $reflectionClass->getConstants();
        $options = [];

        foreach ($constants as $key => $value) {
            $options[$value->value] = $value->value;
        }

        return $options;
    }
}

