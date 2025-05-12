<?php

namespace App\Enums;

enum Gender: string
{
    case Male = 'male';
    case Female = 'female';

    public function label(): string
    {
        return match ($this) {
            self::Male => 'Lelaki',
            self::Female => 'Perempuan',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
