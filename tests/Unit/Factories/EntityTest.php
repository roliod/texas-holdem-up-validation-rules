<?php
declare(strict_types=1);

namespace Tests\Unit\Factories;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\Factories\Entity as EntityFactory;

class EntityTest extends BaseTestCase
{
    public function testItCanBuildRuleResponseEntity(): void
    {
        $rank = 2;
        $isValid = false;

        $ruleResponseEntity = EntityFactory::buildRuleResponseEntity(
            $rank,
            $isValid
        );

        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($isValid, $ruleResponseEntity->getIsValid());
    }
}
