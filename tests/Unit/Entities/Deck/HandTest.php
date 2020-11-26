<?php
declare(strict_types=1);

namespace Tests\Unit\Entities\Deck;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Deck\Entities\Hand as HandEntity;

class HandTest extends BaseTestCase
{
    public function testItCanCreateHandEntity(): void
    {
        $sequence = 'sequence';
        $handEntity = new HandEntity(
            $sequence
        );

        self::assertSame($sequence, $handEntity->getSequence());
    }

    public function testSetters(): void
    {
        $sequence = 'sequence';

        $handEntity = new HandEntity('sequence1');
        $handEntity->setSequence($sequence);

        self::assertSame($sequence, $handEntity->getSequence());
    }
}
