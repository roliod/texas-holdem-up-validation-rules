<?php
declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Roliod\TexasHUPokerValidator\ExampleClass;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function example(): void
    {
        $eg = new ExampleClass();

        $this->assertTrue($eg->isExample());
    }
}
