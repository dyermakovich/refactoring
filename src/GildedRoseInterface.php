<?php

declare(strict_types=1);

namespace App;

use App\Item\ItemInterface;

interface GildedRoseInterface
{
    public function updateQuality(ItemInterface $item): void;
}
