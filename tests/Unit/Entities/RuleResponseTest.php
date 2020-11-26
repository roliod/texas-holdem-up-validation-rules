<?php
declare(strict_types=1);

namespace Tests\Unit\Entities;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\Entities\RuleResponse as RuleResponseEntity;

class RuleResponseTest extends BaseTestCase
{
    public function testItCanCreateRuleResponseEntity(): void
    {
        $rank = 2;
        $isValid = false;

        $ruleResponseEntity = new RuleResponseEntity(
            $rank,
            $isValid
        );

        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($isValid, $ruleResponseEntity->getIsValid());
    }

    public function testSetters(): void
    {
        $rank = 2;
        $isValid = false;

        $ruleResponseEntity = new RuleResponseEntity(3);
        $ruleResponseEntity->setRank($rank);
        $ruleResponseEntity->setIsValid($isValid);

        self::assertSame($rank, $ruleResponseEntity->getRank());
        self::assertSame($isValid, $ruleResponseEntity->getIsValid());
    }
}
