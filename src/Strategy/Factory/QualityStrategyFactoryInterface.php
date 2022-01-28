<?php

declare(strict_types=1);

namespace App\Strategy\Factory;

use App\Item\ItemInterface;
use App\Strategy\Quality\StrategyInterface;

interface QualityStrategyFactoryInterface
{
    public function create(ItemInterface $item): StrategyInterface;
}
