<?php

declare(strict_types=1);

namespace App\Item;

class ItemService implements ItemServiceInterface
{
    public function decSellIn(ItemInterface $item): void
    {
        $item->setSellIn($item->getSellIn() - 1);
    }

    public function incQuality(ItemInterface $item): void
    {
        $item->setQuality($item->getQuality() + 1);
    }

    public function decQuality(ItemInterface $item): void
    {
        $item->setQuality($item->getQuality() - 1);
    }
}
