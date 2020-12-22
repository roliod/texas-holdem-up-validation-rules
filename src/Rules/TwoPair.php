<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class TwoPair extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 8;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
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
