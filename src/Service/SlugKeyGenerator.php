<?php

namespace App\Service;

class SlugKeyGenerator
{

    public const DEFAULT_LENGTH = 6;

    public static function generate(int $length = self::DEFAULT_LENGTH): string
    {
        return str_shuffle(substr(str_repeat(md5(mt_rand()), 2 + $length / 32), 0, $length));
    }

}