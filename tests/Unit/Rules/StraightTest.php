<?php
declare(strict_types=1);

namespace Tests\Unit\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\Straight;
use Roliod\TexasHUPoker\Deck\Factories\VO as VOFactory;

class StraightTest extends BaseTestCase
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

        $straight = new Straight();
        $response = $straight->validate($handVO);

        self::assertSame($matches, $response->getMatches());
    }

    /**
     * @return array
     */
    public function handDataProvider(): array
    {
        return [
            'is_valid' => [
                'sequence' => 'QH JC 10H 9H 8H',
                'matches' => true,
            ],
            'is_valid_2' => [
                'sequence' => 'QH 8H 7C 6H 5H',
                'matches' => true,
            ],
            'is_invalid' => [
                'sequence' => '2S 10C 5C 5H 4H',
                'matches' => false,
            ]
        ];
    }
}
