<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Factories;

use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class VO
{
    /**
     * @param string $hand
     * @param int    $rank
     * @param bool   $matches
     *
     * @return RuleResponseVO
     */
    public static function buildRuleResponseVO(
        string $hand,
        int $rank,
        bool $matches = false
    ): RuleResponseVO {
        return new RuleResponseVO(
            $hand,
            $rank,
            $matches
        );
    }
}
