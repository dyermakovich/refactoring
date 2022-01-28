<?php

declare(strict_types=1);

namespace App\Item;

final class Item implements ItemInterface
{
    private $name;
    private $sellIn;
    private $quality;

    function __construct(string $name, int $sellIn, int $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function setSellIn(int $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }
}
