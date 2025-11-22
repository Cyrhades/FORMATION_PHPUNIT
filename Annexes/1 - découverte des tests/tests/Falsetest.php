<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FalseTest extends TestCase
{
    #[Test]
    public function failure(): void
    {
        $this->assertFalse(true);
    }
    
    #[Test]
    public function success(): void
    {
        $this->assertFalse(false);
    }
}