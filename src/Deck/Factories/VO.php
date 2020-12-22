<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Deck\Factories;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;

class VO
{
    /**
     * @param string $sequence
     *
     * @return HandVO
     */
    public static function buildHandVO(
        string $sequence
    ): HandVO {
        return new HandVO($sequence);
    }
}
