<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker;

use Roliod\TexasHUPoker\Rules\Pair;
use Roliod\TexasHUPoker\Rules\Flush;
use Roliod\TexasHUPoker\Rules\TwoPair;
use Roliod\TexasHUPoker\Rules\Straight;
use Roliod\TexasHUPoker\Rules\HighCard;
use Roliod\TexasHUPoker\Rules\FullHouse;
use Roliod\TexasHUPoker\Rules\RoyalFlush;
use Roliod\TexasHUPoker\Rules\FourOfAKind;
use Roliod\TexasHUPoker\Rules\ThreeOfAKind;
use Roliod\TexasHUPoker\Rules\StraightFlush;

class Config
{
    /**
     * The rules are arranges based on hierarchy.
     *
     * @const array
     */
    public const RULES = [
        RoyalFlush::class,
        StraightFlush::class,
        FourOfAKind::class,
        FullHouse::class,
        Flush::class,
        Straight::class,
        ThreeOfAKind::class,
        TwoPair::class,
        Pair::class,
        HighCard::class,
    ];
}