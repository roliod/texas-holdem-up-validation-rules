<?php
declare(strict_types=1);

namespace Tests\Unit\Rules\Factories;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\Factories\VO as VOFactory;

class VOTest extends BaseTestCase
{
    public function testItCanBuildRuleResponseVO(): void
    {
        $rank = 2;
        $hand = 'hand';
        $matches = false;

        $ruleResponseVO = VOFactory::buildRuleResponseVO(
            $hand,
            $rank,
            $matches
        );

        self::assertSame($hand, $ruleResponseVO->getSequence());
        self::assertSame($rank, $ruleResponseVO->getRank());
        self::assertSame($matches, $ruleResponseVO->getMatches());
    }
}
