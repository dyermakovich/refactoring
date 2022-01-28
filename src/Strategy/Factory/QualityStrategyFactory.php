<?php

declare(strict_types=1);

namespace App\Strategy\Factory;

use App\Config\ConfigInterface;
use App\Item\ItemInterface;
use App\Item\ItemServiceFactory;
use App\Strategy\Quality\AgedBrieStrategy;
use App\Strategy\Quality\BackstagePassesStrategy;
use App\Strategy\Quality\DefaultStrategy;
use App\Strategy\Quality\StrategyInterface;
use App\Strategy\Quality\SulfurasStrategy;

class QualityStrategyFactory implements QualityStrategyFactoryInterface
{
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @var ConfigInterface
     */
    private $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function create(ItemInterface $item): StrategyInterface
    {
        $itemService = ItemServiceFactory::create();

        switch ($item->getName()) {
            case self::AGED_BRIE:
                return new AgedBrieStrategy($this->config, $itemService);
            case self::BACKSTAGE_PASSES:
                return new BackstagePassesStrategy($this->config, $itemService);
            case self::SULFURAS:
                return new SulfurasStrategy($this->config);
            default:
                return new DefaultStrategy($itemService);
        }
    }
}
