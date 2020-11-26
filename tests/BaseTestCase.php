<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

abstract class BaseTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }
}
