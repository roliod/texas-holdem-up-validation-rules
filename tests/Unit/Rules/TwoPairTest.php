<?php
declare(strict_types=1);

namespace Tests\Unit\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\TwoPair;
use Roliod\TexasHUPoker\Deck\Factories\Entity as EntityFactory;

class TwoPairTest extends BaseTestCase
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

        $twoPair = new TwoPair();
        $response = $twoPair->validate($handEntity);

        self::assertSame($matches, $response->getMatches());

    }

    /**
     * @return array
     */
    public function handDataProvider(): array
    {
        return [
            'is_valid' => [
                'sequence' => '10H 10C 5C 5H 4H',
                'matches' => true,
            ],
            'is_invalid' => [
                'sequence' => '2S 10C 5C 5H 4H',
                'matches' => false,
            ]
        ];
    }
}
