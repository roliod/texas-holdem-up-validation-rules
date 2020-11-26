<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class TwoPair extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 8;

    /**
     * {@inheritDoc}
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
        $isTwoPair = $this->isTwoPair($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isTwoPair
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isTwoPair(string $sequence): bool
    {
        $ranks = $this->getRanksFromSequence($sequence);
        $rankOccurrences = array_count_values($ranks);

        return count($rankOccurrences) === 3
            && isset(array_count_values($rankOccurrences)[2])
            && array_count_values($rankOccurrences)[2] === 2;
    }
}
