<?php

declare(strict_types=1);

namespace App\Item;

interface ItemServiceInterface
{
    public function decSellIn(ItemInterface $item): void;

    public function incQuality(ItemInterface $item): void;

    public function decQuality(ItemInterface $item): void;
}
