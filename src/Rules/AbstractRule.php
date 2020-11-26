<?php
declare(strict_types=1);

namespace Roliod\TexasHUPoker\Rules;

use Roliod\TexasHUPoker\Rules\Contracts\Rule as RuleContract;
use Roliod\TexasHUPoker\Rules\Factories\Entity as EntityFactory;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

abstract class AbstractRule implements RuleContract
{
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

    /**
     * @param string $sequence
     *
     * @return array
     */
    protected function getRanksFromSequence(string $sequence): array
    {
        $cards = explode(' ', $sequence);

        $ranks = [];
        foreach ($cards as $card) {
            $ranks[] = mb_substr($card, 0, -1);
        }

        return $ranks;
    }

    /**
     * @param string $sequence
     *
     * @return array
     */
    protected function getSuitsFromSequence(string $sequence): array
    {
        $cards = explode(' ', $sequence);

        $suits = [];
        foreach ($cards as $card) {
            $suits[] = substr($card, -1);
        }

        return $suits;
    }
}
