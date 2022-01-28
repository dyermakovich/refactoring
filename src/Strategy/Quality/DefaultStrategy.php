<?php

declare(strict_types=1);

namespace App\Strategy\Quality;

use App\Item\ItemInterface;
use App\Item\ItemServiceInterface;

class DefaultStrategy implements StrategyInterface
{
    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    public function __construct(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }

    public function update(ItemInterface $item): void
    {
        if ($item->getQuality() > 0) {
            $this->itemService->decQuality($item);
        }

        $this->itemService->decSellIn($item);

        if (
            $item->getSellIn() < 0
            && $item->getQuality() > 0
        ) {
            $this->itemService->decQuality($item);
        }
    }
}
