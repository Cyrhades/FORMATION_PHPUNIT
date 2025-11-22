<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class EqualsTest extends TestCase
{
    #[Test]
    public function failure(): void
    {
        $this->assertEquals(2205, 2204);
    }
    
    #[Test]
    public function success(): void
    {
        $this->assertEquals('2204', 2204);
    }
}