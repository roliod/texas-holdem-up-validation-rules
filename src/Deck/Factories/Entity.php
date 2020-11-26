<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Deck\Factories;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;

class Entity
{
    /**
     * @param string $sequence
     *
     * @return HandEntity
     */
    public static function buildHandEntity(
        string $sequence
    ): HandEntity {
        return new HandEntity($sequence);
    }
}
