<?php

declare(strict_types=1);

namespace App;

use App\Config\Config;
use App\Item\ItemInterface;
use App\Strategy\Factory\QualityStrategyFactory;

final class GildedRose
{
    public function updateQuality(ItemInterface $item)
    {
        $config = new Config();
        $factory = new QualityStrategyFactory($config);
        $strategy = $factory->create($item);
        $strategy->update($item);
    }
}
