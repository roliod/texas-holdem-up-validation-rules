<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Rules\Contracts\Rule as RuleContract;
use Roliod\TexasHUPoker\Rules\Concerns\CanGetRanksFromSequence;
use Roliod\TexasHUPoker\Rules\Concerns\CanGetSuitsFromSequence;
use Roliod\TexasHUPoker\Rules\Factories\VO as VOFactory;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

abstract class AbstractRule implements RuleContract
{
    use CanGetRanksFromSequence, CanGetSuitsFromSequence;

    /**
     * @param string $sequence
     * @param int    $rank
     * @param bool   $matches
     *
     * @return RuleResponseVO
     */
    protected function buildRuleResponse(
        string $sequence,
        int $rank,
        bool $matches
    ): RuleResponseVO {
        return VOFactory::buildRuleResponseVO(
            $sequence,
            $rank,
            $matches
        );
    }
}
