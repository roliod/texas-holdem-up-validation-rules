<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class Pair extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 9;

    /**
     * @param HandEntity $handEntity
     *
     * @return RuleResponseEntity
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
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
