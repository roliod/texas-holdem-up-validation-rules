<?php
declare(strict_types=1);

namespace Tests\Unit;

use Tests\BaseTestCase;
use Roliod\TexasHUPoker\Evaluate;
use Roliod\TexasHUPoker\Exceptions\FileDoesNotExist as FileDoesNotExistException;
use Roliod\TexasHUPoker\Exceptions\InvalidFileContent as InvalidFileContentException;

class EvaluateTest extends BaseTestCase
{
    public function testItCanRankDeckOfCards(): void
    {
        $evaluator = new Evaluate(
            __DIR__ . '/../__data/hands.txt'
        );
        $rank = $evaluator->rank();

        $expectedRank = file_get_contents(
            __DIR__ . '/../__data/rank.txt'
        );

        self::assertSame($expectedRank, $rank);
    }

    public function testItFailsWithAnInvalidDeckFilePath(): void
    {
        $this->expectException(FileDoesNotExistException::class);
        $evaluator = new Evaluate('invalid-path.text');
        $evaluator->rank();
    }

    public function testItFailsWithInvalidFileContent(): void
    {
        $this->expectException(InvalidFileContentException::class);
        $evaluator = new Evaluate(
            __DIR__ . '/../__data/invalid.txt'
        );
        $evaluator->rank();
    }
}
