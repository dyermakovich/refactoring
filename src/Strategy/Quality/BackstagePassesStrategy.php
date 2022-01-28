<?php

declare(strict_types=1);

namespace App\Strategy\Quality;

use App\Config\ConfigInterface;
use App\Item\ItemInterface;
use App\Item\ItemServiceInterface;

class BackstagePassesStrategy implements StrategyInterface
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
        $maxQuality = $this->config->getMaxQuality();
        $increaseQualityIfSellInLess = $this->config->increaseQualityIfSellInLess();
        $increaseQualityIfSellInLessAgain = $this->config->increaseQualityIfSellInLessAgain();

        if ($item->getQuality() < $maxQuality) {
            $this->itemService->incQuality($item);

            if ($item->getSellIn() < $increaseQualityIfSellInLess) {
                if ($item->getQuality() < $maxQuality) {
                    $this->itemService->incQuality($item);
                }
            }

            if ($item->getSellIn() < $increaseQualityIfSellInLessAgain) {
                if ($item->getQuality() < $maxQuality) {
                    $this->itemService->incQuality($item);
                }
            }
        }

        $this->itemService->decSellIn($item);

        if ($item->getSellIn() < 0) {
            $item->setQuality(0);
        }
    }
}
