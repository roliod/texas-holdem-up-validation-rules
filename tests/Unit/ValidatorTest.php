<?php
declare(strict_types=1);

namespace Tests\Unit;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Validator;

class ValidatorTest extends BaseTestCase
{
    /**
     * @dataProvider provideDeckData
     *
     * @param string $input
     * @param bool   $isValid
     * @param bool   $hasError
     * @param string|null $errorMessage
     */
    public function testItCanValidateInput(
        string $input,
        bool $isValid,
        bool $hasError,
        ?string $errorMessage = null
    ): void {
        $validator = Validator::create($input);

        self::assertSame($isValid, $validator->isValid());
        self::assertSame($hasError, $validator->hasError());
        self::assertSame($errorMessage, $validator->error());
    }

    /**
     * @return array[]
     */
    public function provideDeckData(): array
    {
        return [
            'invalid_hand_count' => [
                'input' => "3H 3J 3J 4J 5J\n" . "3 3 3 3",
                'is_valid' => false,
                'has_error' => true,
                'expected_message' => 'Sequence count must be 5 each. Provided: 3 3 3 3'
            ],
            'invalid_rank' => [
                'input' => "QH JJ 10J AJ KJ\n" . "QH 18J 10J AJ KJ",
                'is_valid' => false,
                'has_error' => true,
                'expected_message' => 'Invalid rank provided: 18'
            ],
            'invalid_suit' => [
                'input' => "QH JJ 10J AJ KJ\n" . "QH QJ 10J AJ KJ",
                'is_valid' => false,
                'has_error' => true,
                'expected_message' => 'Invalid suit provided: H'
            ],
            'valid' => [
                'input' => "10❤ 10♦ 10♠ 9♣ 9♦\n" . "4♠ J♠ 8♠ 2♠ 9♠",
                'is_valid' => true,
                'has_error' => false,
                'expected_message' => null
            ]
        ];
    }
}
