<?php

declare(strict_types=1);

namespace App\Config;

final class ConfigFactory
{
    public static function create(): ConfigInterface
    {
        return new Config();
    }
}
