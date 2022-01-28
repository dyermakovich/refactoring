<?php

declare(strict_types=1);

namespace App\Config;

use Symfony\Component\Yaml\Yaml;

class Config implements ConfigInterface
{
    private const MAX_QUALITY = 'max_quality';
    private const LEGENDARY_QUALITY = 'legendary_quality';
    private const INCREASE_QUALITY_IF_SELL_IN_LESS = 'increase_quality_if_sell_in_less';
    private const INCREASE_QUALITY_IF_SELL_IN_LESS_AGAIN = 'increase_quality_if_sell_in_less_again';

    /**
     * @var array
     */
    private $data;

    public function __construct()
    {
        $this->data = Yaml::parseFile(__DIR__ . '/../../config/gilded-rose.yaml');
    }

    public function getMaxQuality(): int
    {
        return $this->data[self::MAX_QUALITY];
    }

    public function getLegendaryQuality(): int
    {
        return $this->data[self::LEGENDARY_QUALITY];
    }

    public function increaseQualityIfSellInLess(): int
    {
        return $this->data[self::INCREASE_QUALITY_IF_SELL_IN_LESS];
    }

    public function increaseQualityIfSellInLessAgain(): int
    {
        return $this->data[self::INCREASE_QUALITY_IF_SELL_IN_LESS_AGAIN];
    }
}
