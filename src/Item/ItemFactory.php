<?php

declare(strict_types=1);

namespace App\Item;

final class ItemFactory
{
    public static function create(string $name, int $sellIn, int $quality): ItemInterface
    {
        return new Item($name, $sellIn, $quality);
    }
}
