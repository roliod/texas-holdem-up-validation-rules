<?php
declare(strict_types=1);

namespace Tests\Unit\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\HighCard;
use Roliod\TexasHUPoker\Deck\Factories\Entity as EntityFactory;

class HighCardTest extends BaseTestCase
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

        $highCard = new HighCard();
        $response = $highCard->validate($handEntity);

        self::assertSame($matches, $response->getMatches());
    }

    /**
     * @return array
     */
    public function handDataProvider(): array
    {
        return [
            'is_valid' => [
                'sequence' => '10H 2C QA JS 5S',
                'matches' => true,
            ],
            'is_invalid' => [
                'sequence' => '10H 10C AC JH AH',
                'matches' => false,
            ]
        ];
    }
}
