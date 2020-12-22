<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class Flush extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 5;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
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
