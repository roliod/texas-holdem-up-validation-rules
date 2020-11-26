<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Deck;

class Rank
{
    /**
     * This maps lettered ranks to numbers.
     *
     * @const array
     */
    public const LETTERED_RANKS_TO_NUMBER = [
        'K' => 13,
        'Q' => 12,
        'J' => 11,
        'A' => 1
    ];
}
