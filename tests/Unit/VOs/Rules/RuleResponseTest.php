<?php
declare(strict_types=1);

namespace Tests\Unit\VOs\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\VOs\RuleResponse as RuleResponseVO;

class RuleResponseTest extends BaseTestCase
{
    public function testItCanCreateRuleResponseVO(): void
    {
        $rank = 2;
        $sequence = 'hand';
        $matches = false;

        $ruleResponseVO = new RuleResponseVO(
            $sequence,
            $rank,
            $matches
        );

        self::assertSame($sequence, $ruleResponseVO->getSequence());
        self::assertSame($rank, $ruleResponseVO->getRank());
        self::assertSame($matches, $ruleResponseVO->getMatches());
    }

    public function testSetters(): void
    {
        $rank = 2;
        $sequence = 'hand';
        $matches = false;

        $ruleResponseVO = new RuleResponseVO('hand1', 3);
        $ruleResponseVO->setRank($rank);
        $ruleResponseVO->setSequence($sequence);
        $ruleResponseVO->setMatches($matches);

        self::assertSame($sequence, $ruleResponseVO->getSequence());
        self::assertSame($rank, $ruleResponseVO->getRank());
        self::assertSame($matches, $ruleResponseVO->getMatches());
    }
}
