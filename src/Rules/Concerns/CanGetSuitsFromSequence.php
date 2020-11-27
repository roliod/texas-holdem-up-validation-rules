<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Concerns;

trait CanGetSuitsFromSequence
{
    /**
     * @param string $sequence
     *
     * @return array
     */
    public function getSuitsFromSequence(string $sequence): array
    {
        $cards = explode(' ', $sequence);

        $suits = [];
        foreach ($cards as $card) {
            $suits[] = mb_substr($card, -1, 142, 'utf-8');
        }

        return $suits;
    }
}
