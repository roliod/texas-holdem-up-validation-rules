<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class HighCard extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 10;

    /**
     * @param HandEntity $handEntity
     *
     * @return RuleResponseEntity
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
        $isHighCard = $this->isHighCard($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isHighCard
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isHighCard(string $sequence): bool
    {
        $ranks = $this->getRanksFromSequence($sequence);

        return count(array_unique($ranks)) === 5;
    }
}
