<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class StraightFlush extends AbstractRule
{
    /**
     * @const int
     */
    private const RANK = 2;

    /**
     * {@inheritDoc}
     */
    public function validate(HandVO $handVO): RuleResponseVO
    {
        $sequence = $handVO->getSequence();
        $isStraightFlush = $this->isStraightFlush($handVO);

        return $this->buildRuleResponse(
            $sequence,
            self::RANK,
            $isStraightFlush
        );
    }

    /**
     * @param HandVO $handVO
     *
     * @return bool
     */
    private function isStraightFlush(HandVO $handVO): bool
    {
        $flush = (new Flush())->validate($handVO);
        $straight = (new Straight())->validate($handVO);

        return $flush->getMatches() && $straight->getMatches();
    }
}
