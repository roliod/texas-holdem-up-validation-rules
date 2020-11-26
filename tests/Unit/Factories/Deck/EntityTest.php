<?php
declare(strict_types=1);

namespace Tests\Unit\Factories\Deck;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Deck\Factories\Entity as EntityFactory;

class EntityTest extends BaseTestCase
{
    public function testItCanBuildRuleResponseEntity(): void
    {
        $sequence = 'sequence';
        $handEntity = EntityFactory::buildHandEntity(
            $sequence
        );

        self::assertSame($sequence, $handEntity->getSequence());
    }
}
