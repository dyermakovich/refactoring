<?php

declare(strict_types=1);

namespace App\Item;

final class ItemServiceFactory
{
    public static function create(): ItemServiceInterface
    {
        return new ItemService();
    }
}
