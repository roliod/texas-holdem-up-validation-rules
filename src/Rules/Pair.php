<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class Pair extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 9;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
        $isPair = $this->isPair($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isPair
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isPair(string $sequence): bool
    {
        $ranks = $this->getRanksFromSequence($sequence);
        $rankOccurrences = array_count_values($ranks);

        return in_array(2, $rankOccurrences, true)
            && count($rankOccurrences) === 4;
    }
}
