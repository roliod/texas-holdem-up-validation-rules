<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class FullHouse extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 4;

    /**
     * {@inheritDoc}
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
        $isFullHouse = $this->isFullHouse($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isFullHouse
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isFullHouse(string $sequence): bool
    {
        $ranks = $this->getRanksFromSequence($sequence);
        $uniqueOccurrences = array_count_values($ranks);

        return count($uniqueOccurrences) === 2
            && in_array(3, $uniqueOccurrences, true)
            && in_array(2, $uniqueOccurrences, true);
    }
}
