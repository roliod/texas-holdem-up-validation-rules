<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class StraightFlush extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 2;

    /**
     * @param HandEntity $handEntity
     *
     * @return RuleResponseEntity
     */
    public function validate(HandEntity $handEntity): RuleResponseEntity
    {
        $sequence = $handEntity->getSequence();
        $isStraightFlush = $this->isStraightFlush($handEntity);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isStraightFlush
        );
    }

    /**
     * @param HandEntity $handEntity
     *
     * @return bool
     */
    private function isStraightFlush(HandEntity $handEntity): bool
    {
        $flush = (new Flush())->validate($handEntity);
        $straight = (new Straight())->validate($handEntity);

        return $flush->getMatches() && $straight->getMatches();
    }
}
