<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class TrueTest extends TestCase
{
    #[Test]
    public function failure(): void
    {
         $this->assertTrue(false);
    }
    
    #[Test]
    public function success(): void
    {
        $this->assertTrue(true);
    }
}