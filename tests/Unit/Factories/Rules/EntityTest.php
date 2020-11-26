<?php
declare(strict_types=1);

namespace Tests\Unit\Rules\Factories;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\Factories\Entity as EntityFactory;

class EntityTest extends BaseTestCase
{
    public function testItCanBuildRuleResponseEntity(): void
    {
        $rank = 2;
        $hand = 'hand';
        $matches = false;

        $ruleResponseEntity = EntityFactory::buildRuleResponseEntity(
            $hand,
            $rank,
            $matches
        );

        self::assertSame($hand, $ruleResponseEntity->getHand());
        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($matches, $ruleResponseEntity->getMatches());
    }
}
