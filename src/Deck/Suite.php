<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Deck;

class Suite
{
    /**
     * @const string
     */
    public const SPADE = 'S';
    public const HEART = 'H';
    public const CLUBS = 'C';
    public const DIAMOND = 'D';

    /**
     * This converts unicode suites to strings
     *
     * @const array
     */
    public const UNICODE_TO_STRING = [
        '❤' => self::HEART,
        '♠' => self::SPADE,
        '♣' => self::CLUBS,
        '♦' => self::DIAMOND
    ];
}
