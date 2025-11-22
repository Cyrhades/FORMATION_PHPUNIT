<?php declare(strict_types=1);

namespace Tests;

use App\Greeter;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

final class GreeterTest extends TestCase
{
    #[Test]
    public function greet(): void
    {
        $greeter = new Greeter;

        $greeting = $greeter->greet('Alice');

        $this->assertSame('Hello, Alice!', $greeting);
    }

    #[Test]
    public function testException(): void
    {
        $greeter = new Greeter;
 
        $this->expectException(\TypeError::class);

        $greeting = $greeter->greet(1);
    }
}