<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Rules\Contracts\Rule as RuleContract;
use Roliod\TexasHUPoker\Rules\Concerns\CanGetRanksFromSequence;
use Roliod\TexasHUPoker\Rules\Concerns\CanGetSuitsFromSequence;
use Roliod\TexasHUPoker\Rules\Factories\Entity as EntityFactory;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

abstract class AbstractRule implements RuleContract
{
    use CanGetRanksFromSequence, CanGetSuitsFromSequence;

    /**
     * @param string $sequence
     * @param int    $rank
     * @param bool   $matches
     *
     * @return RuleResponseEntity
     */
    protected function buildRuleResponse(
        string $sequence,
        int $rank,
        bool $matches
    ): RuleResponseEntity {
        return EntityFactory::buildRuleResponseEntity(
            $sequence,
            $rank,
            $matches
        );
    }
}
