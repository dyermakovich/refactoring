<?php

declare(strict_types=1);

namespace App\Strategy\Quality;

use App\Config\ConfigInterface;
use App\Item\ItemInterface;

class SulfurasStrategy implements StrategyInterface
{
    /**
     * @var ConfigInterface
     */
    private $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function update(ItemInterface $item): void
    {
        $legendaryQuality = $this->config->getLegendaryQuality();

        if ($item->getQuality() > 0) {
            $item->setQuality($legendaryQuality);
        }
    }
}
