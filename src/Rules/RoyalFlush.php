<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class RoyalFlush extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 1;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
        $isRoyalSequence = $this->isRoyalFlushSequence($sequence);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isRoyalSequence
        );
    }

    /**
     * @param string $sequence
     *
     * @return bool
     */
    private function isRoyalFlushSequence(string $sequence): bool
    {
        $ranks = ['10', 'K', 'J', 'A', 'Q'];

        foreach ($ranks as $rank) {
            if (strpos($sequence, $rank) === false) {
                return false;
            }
        }

        return true;
    }
}
