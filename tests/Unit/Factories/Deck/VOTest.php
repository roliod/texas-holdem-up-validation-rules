<?php
declare(strict_types=1);

namespace Tests\Unit\Factories\Deck;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Deck\Factories\VO as VOFactory;

class VOTest extends BaseTestCase
{
    public function testItCanBuildRuleResponseVO(): void
    {
        $sequence = 'sequence';
        $handVO = VOFactory::buildHandVO(
            $sequence
        );

        self::assertSame($sequence, $handVO->getSequence());
    }
}
