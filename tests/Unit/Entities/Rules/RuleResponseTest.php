<?php
declare(strict_types=1);

namespace Tests\Unit\Entities\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class RuleResponseTest extends BaseTestCase
{
    public function testItCanCreateRuleResponseEntity(): void
    {
        $rank = 2;
        $hand = 'hand';
        $matches = false;

        $ruleResponseEntity = new RuleResponseEntity(
            $hand,
            $rank,
            $matches
        );

        self::assertSame($hand, $ruleResponseEntity->getHand());
        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($matches, $ruleResponseEntity->getMatches());
    }

    public function testSetters(): void
    {
        $rank = 2;
        $hand = 'hand';
        $matches = false;

        $ruleResponseEntity = new RuleResponseEntity('hand1', 3);
        $ruleResponseEntity->setRank($rank);
        $ruleResponseEntity->setHand($hand);
        $ruleResponseEntity->setMatches($matches);

        self::assertSame($hand, $ruleResponseEntity->getHand());
        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($matches, $ruleResponseEntity->getMatches());
    }
}
