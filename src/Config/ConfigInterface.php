<?php

declare(strict_types=1);

namespace App\Config;

interface ConfigInterface
{
    public function getMaxQuality(): int;

    public function getLegendaryQuality(): int;

    public function increaseQualityIfSellInLess(): int;

    public function increaseQualityIfSellInLessAgain(): int;
}
