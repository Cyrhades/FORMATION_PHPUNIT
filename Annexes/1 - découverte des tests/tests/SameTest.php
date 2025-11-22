<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SameTest extends TestCase
{
    #[Test]
    public function failure(): void
    {
        $this->assertSame('2204', 2204);
    }
    
    #[Test]
    public function success(): void
    {
        $this->assertSame('2204', '2204');
    }
}