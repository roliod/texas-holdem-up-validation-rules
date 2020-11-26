<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Rank;
use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class StraightFlush extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 2;

    /**
     * @param HandEntity $handEntity
     *
     * @return RuleResponseEntity
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
        $isStraightFlush = $this->isStraightFlush($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isStraightFlush
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isStraightFlush(string $sequence): bool
    {
        $suits = $this->getSuitsFromSequence($sequence);
        $ranks = $this->decorateRanks(
            $this->getRanksFromSequence($sequence)
        );

        die(print_r(array_values($ranks)));

//        return count(array_unique($suits)) === 1;
    }

    /**
     * This method does the following:
     * - Loops through all ranks
     * - Turns a lettered rank to its number representation.
     *
     * @param array $ranks
     *
     * @return array
     */
    private function decorateRanks(array $ranks): array
    {
        foreach ($ranks as $key => $rank) {
            if (!is_numeric($rank)) {
                $ranks[$key] = Rank::LETTERED_RANKS_TO_NUMBER[$rank];
            }
        }

        return $ranks;
    }
}
