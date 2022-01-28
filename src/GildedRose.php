<?php

declare(strict_types=1);

namespace App;

use App\Item\ItemInterface;
use App\Strategy\Factory\QualityStrategyFactoryInterface;

final class GildedRose implements GildedRoseInterface
{
    /**
     * @var QualityStrategyFactoryInterface
     */
    private $qualityStrategyFactory;

    public function __construct(QualityStrategyFactoryInterface $qualityStrategyFactory)
    {
        $this->qualityStrategyFactory = $qualityStrategyFactory;
    }

    public function updateQuality(ItemInterface $item): void
    {
        $strategy = $this->qualityStrategyFactory->create($item);
        $strategy->update($item);
    }
}
