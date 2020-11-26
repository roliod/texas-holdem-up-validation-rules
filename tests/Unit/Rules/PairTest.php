<?php
declare(strict_types=1);

namespace Tests\Unit\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\Pair;
use Roliod\TexasHUPoker\Deck\Factories\Entity as EntityFactory;

class PairTest extends BaseTestCase
{
    /**
     * @dataProvider handDataProvider
     *
     * @param string $sequence
     * @param bool   $matches
     */
    public function testItCanValidateHand(
        string $sequence,
        bool $matches
    ): void {
        $handEntity = EntityFactory::buildHandEntity($sequence);

        $pair = new Pair();
        $response = $pair->validate($handEntity);

        self::assertSame($matches, $response->getMatches());
    }

    /**
     * @return array
     */
    public function handDataProvider(): array
    {
        return [
            'is_valid' => [
                'sequence' => '10H 10C AC JH 5H',
                'matches' => true,
            ],
            'is_invalid' => [
                'sequence' => '10H 10C AC JH AH',
                'matches' => false,
            ]
        ];
    }
}
