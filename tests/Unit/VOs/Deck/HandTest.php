<?php
declare(strict_types=1);

namespace Tests\Unit\VOs\Deck;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Deck\VOs\Hand as HandVO;

class HandTest extends BaseTestCase
{
    public function testItCanCreateHandVO(): void
    {
        $sequence = 'sequence';
        $handVO = new HandVO(
            $sequence
        );

        self::assertSame($sequence, $handVO->getSequence());
    }

    public function testSetters(): void
    {
        $sequence = 'sequence';

        $handVO = new HandVO('sequence1');
        $handVO->setSequence($sequence);

        self::assertSame($sequence, $handVO->getSequence());
    }
}
