<?php

declare(strict_types=1);

namespace App\Strategy\Quality;

use App\Item\ItemInterface;

interface StrategyInterface
{
    public function update(ItemInterface $item): void;
}
