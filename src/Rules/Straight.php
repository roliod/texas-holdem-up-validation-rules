<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Rank;
use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class Straight extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 6;

    /**
     * @param HandEntity $handEntity
     *
     * @return RuleResponseEntity
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
        $isStraight = $this->isStraight($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isStraight
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isStraight(string $sequence): bool
    {
        $ranks = $this->decorateRanks(
            $this->getRanksFromSequence($sequence)
        );

        return $this->isIncreasing($ranks)
            || $this->isDecreasing($ranks);
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

    /**
     * @param array $ranks
     *
     * @return bool
     */
    private function isIncreasing(array $ranks): bool
    {
        $ranksCount = count($ranks);
        for($x = 1; $x < $ranksCount - 1; $x++) {
            if (!($ranks[$x] > $ranks[$x - 1])) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $ranks
     *
     * @return bool
     */
    private function isDecreasing(array $ranks): bool
    {
        $ranksCount = count($ranks);
        for($x = 1; $x < $ranksCount - 1; $x++) {
            if (!($ranks[$x] < $ranks[$x - 1])) {
                return false;
            }
        }

        return true;
    }
}
