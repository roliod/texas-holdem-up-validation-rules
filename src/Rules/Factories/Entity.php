<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules\Factories;

use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class Entity
{
    /**
     * @param int  $rank
     * @param bool $isValid
     *
     * @return RuleResponseEntity
     */
    public static function buildRuleResponseEntity(
        int $rank,
        bool $isValid = true
    ): RuleResponseEntity {
        return new RuleResponseEntity(
            $rank,
            $isValid
        );
    }
}
