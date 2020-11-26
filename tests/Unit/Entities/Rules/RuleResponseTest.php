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
        $sequence = 'hand';
        $matches = false;

        $ruleResponseEntity = new RuleResponseEntity(
            $sequence,
            $rank,
            $matches
        );

        self::assertSame($sequence, $ruleResponseEntity->getSequence());
        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($matches, $ruleResponseEntity->getMatches());
    }

    public function testSetters(): void
    {
        $rank = 2;
        $sequence = 'hand';
        $matches = false;

        $ruleResponseEntity = new RuleResponseEntity('hand1', 3);
        $ruleResponseEntity->setRank($rank);
        $ruleResponseEntity->setSequence($sequence);
        $ruleResponseEntity->setMatches($matches);

        self::assertSame($sequence, $ruleResponseEntity->getSequence());
        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($matches, $ruleResponseEntity->getMatches());
    }
}
