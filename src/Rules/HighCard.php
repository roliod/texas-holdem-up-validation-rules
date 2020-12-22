<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class HighCard extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 10;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
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
