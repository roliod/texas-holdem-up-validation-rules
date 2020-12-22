<?php
declare(strict_types=1);

namespace Tests\Unit\Rules;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Rules\StraightFlush;
use Roliod\TexasHUPoker\Deck\Factories\VO as VOFactory;

class StraightFlushTest extends BaseTestCase
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

        $twoPair = new StraightFlush();
        $response = $twoPair->validate($handVO);

        self::assertSame($matches, $response->getMatches());
    }

    /**
     * @return array
     */
    public function handDataProvider(): array
    {
        return [
            'is_valid' => [
                'sequence' => 'QH JH 10H 9H 8H',
                'matches' => true,
            ],
            'is_valid_2' => [
                'sequence' => 'QH 8H 7H 6H 5H',
                'matches' => true,
            ],
            'is_invalid' => [
                'sequence' => '2S 10C 5C 5H 4H',
                'matches' => false,
            ],
            'is_invalid_2' => [
                'sequence' => '2S 10S 5S 5S 4S',
                'matches' => false,
            ]
        ];
    }
}
