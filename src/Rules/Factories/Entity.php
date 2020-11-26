<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Factories;

use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class Entity
{
    /**
     * @param string $hand
     * @param int    $rank
     * @param bool   $matches
     *
     * @return RuleResponseEntity
     */
    public static function buildRuleResponseEntity(
        string $hand,
        int $rank,
        bool $matches = false
    ): RuleResponseEntity {
        return new RuleResponseEntity(
            $hand,
            $rank,
            $matches
        );
    }
}
