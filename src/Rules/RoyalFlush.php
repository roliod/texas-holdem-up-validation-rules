<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class RoyalFlush extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 1;

    /**
     * @param HandEntity $handEntity
     *
     * @return RuleResponseEntity
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
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
