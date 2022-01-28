<?php

declare(strict_types=1);

namespace App\Item;

interface ItemInterface
{
    public function getName(): string;

    public function getSellIn(): int;

    public function setSellIn(int $sellIn): void;

    public function getQuality(): int;

    public function setQuality(int $quality): void;

    public function __toString(): string;
}
