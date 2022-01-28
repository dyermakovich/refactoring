<?php

declare(strict_types=1);

namespace App\Strategy\Quality;

use App\Config\ConfigInterface;
use App\Item\ItemInterface;
use App\Item\ItemServiceInterface;

class AgedBrieStrategy implements StrategyInterface
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var ItemServiceInterface
     */
    private $itemService;

    public function __construct(ConfigInterface $config, ItemServiceInterface $itemService)
    {
        $this->config = $config;
        $this->itemService = $itemService;
    }

    public function update(ItemInterface $item): void
    {
        if ($item->getQuality() < $this->config->getMaxQuality()) {
            $this->itemService->incQuality($item);
        }

        $this->itemService->decSellIn($item);

        if (
            $item->getSellIn() < 0
            && $item->getQuality() < $this->config->getMaxQuality()
        ) {
            $this->itemService->incQuality($item);
        }
    }
}
