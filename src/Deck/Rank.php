<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Deck;

class Rank
{
    /**
     * @const string
     */
    public const KING = 'K';
    public const ACE = 'A';
    public const JACK = 'J';
    public const QUEEN = 'Q';

    /**
     * This maps lettered ranks to numbers.
     *
     * @const array
     */
    public const LETTERED_RANKS_TO_NUMBER = [
        self::KING => 13,
        self::QUEEN => 12,
        self::JACK => 11,
        self::ACE => 1
    ];

    /**
     * @const array
     */
    public const LIST = [
        self::JACK,
        self::QUEEN,
        self::KING,
        self::ACE,
        10,
        9,
        8,
        7,
        6,
        5,
        4,
        3,
        2
    ];
}
