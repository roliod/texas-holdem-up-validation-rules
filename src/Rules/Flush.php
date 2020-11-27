<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class Flush extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 5;

    /**
     * {@inheritDoc}
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
        $isFlush = $this->isFlush($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isFlush
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isFlush(string $sequence): bool
    {
        $suits = $this->getSuitsFromSequence($sequence);

        return count(array_unique($suits)) === 1;
    }
}
