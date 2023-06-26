<?php

namespace App\Enums\Traits;

trait BaseEnumTrait
{
    public static function names(): array
    {
        return array_column(static::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(static::cases(), 'value');
    }

    public static function toArray(): array
    {
        return array_combine(static::names(), static::values());
    }
}
