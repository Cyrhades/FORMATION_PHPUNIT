<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ArrayIsIdenticalToArrayOnlyConsideringListOfKeysTest extends TestCase
{
    #[Test]
    public function failure(): void
    {
        $this->assertArrayIsIdenticalToArrayOnlyConsideringListOfKeys(
            [
                'timestamp' => 'A',
                'foo'       => 'B',
            ],
            [
                'timestamp' => 'C',
                'foo'       => 'D',
            ],
            [
                'timestamp' => 'E',
                'foo',
            ],
        );
    }

    #[Test]
    public function success(): void
    {
        $this->assertArrayIsIdenticalToArrayOnlyConsideringListOfKeys(
             [
                'timestamp' => 'A',
                'foo'       => 'B',
            ],
            [
                'timestamp' => 'C',
                'foo'       => 'D',
            ],
            [
                'timestamp' => 'E',
                'foo'       => 'F'
            ],
        );
    }
}