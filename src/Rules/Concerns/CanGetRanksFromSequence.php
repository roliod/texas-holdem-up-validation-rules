<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Concerns;

trait CanGetRanksFromSequence
{
    /**
     * @param string $sequence
     *
     * @return array
     */
    protected function getRanksFromSequence(string $sequence): array
    {
        $cards = explode(' ', $sequence);

        $ranks = [];
        foreach ($cards as $card) {
            $ranks[] = mb_substr($card, 0, -1);
        }

        return $ranks;
    }
}
