<?php
declare(strict_types=1);

namespace Tests\Unit\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\ThreeOfAKind;
use Roliod\TexasHUPoker\Deck\Factories\VO as VOFactory;

class ThreeOfAKindTest extends BaseTestCase
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
        $handVO = VOFactory::buildHandVO($sequence);

        $threeOfAKind = new ThreeOfAKind();
        $response = $threeOfAKind->validate($handVO);

        self::assertSame($matches, $response->getMatches());
    }

    /**
     * @return array
     */
    public function handDataProvider(): array
    {
        return [
            'is_valid' => [
                'sequence' => '10H 10C 10C 2H AH',
                'matches' => true,
            ],
            'is_invalid' => [
                'sequence' => '2S 10C 5C 5H 4H',
                'matches' => false,
            ]
        ];
    }
}
