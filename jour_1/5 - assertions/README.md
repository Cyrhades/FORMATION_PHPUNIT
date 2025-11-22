# Assertions

Base: https://docs.phpunit.de/en/12.4/assertions.html

Dans les exemples ci-dessous, les tests nommés *testFailure* échouent intentionnellement et ne permettent donc pas de valider un test, contrairement à ceux nommés *testSuccess*. Les *testFailure* sont fournis à titre pédagogique afin d’illustrer le comportement attendu lorsqu’un test est rejeté.


## Type Boolean

### assertTrue
```assertTrue(bool $condition[, string $message]);```

```php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class TrueTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
         $this->assertTrue(false);
    }
    
    #[Test]
    public function testSuccess(): void
    {
        $this->assertTrue(true);
    }
}
```
### assertFalse
```assertFalse(bool $condition[, string $message]);```

```php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FalseTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertFalse(true);
    }
    
    #[Test]
    public function testSuccess(): void
    {
        $this->assertFalse(false);
    }
}
```



## Type Identity
### assertSame
```assertSame(mixed $expected, mixed $actual[, string $message]);```

```php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SameWithMixedTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertSame('2204', 2204);
    }
    
    #[Test]
    public function testSuccess(): void
    {
        $this->assertSame('a', 'a');
    }
}
```

### assertArrayIsIdenticalToArrayOnlyConsideringListOfKeys
```assertArrayIsIdenticalToArrayOnlyConsideringListOfKeys(array $expected, array $actual, array $keysToBeConsidered[, string $message])```

```php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ArrayIsIdenticalToArrayOnlyConsideringListOfKeysTest extends TestCase
{
    //#[Test]
    public function testFailure(): void
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
                'foo',
            ],
        );
    }

    #[Test]
    public function testSuccess(): void
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
```


## Type Equality


### assertEquals
Contrairement à assertSame, assertEquals ne regarde pas le type (loose comparison).

```php
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
```

## Equality

### assertObjectEquals

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ObjectEqualsTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertObjectEquals((object)['a' => 1], (object)['a' => 2]);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertObjectEquals((object)['a' => 1], (object)['a' => 1]);
    }
}
```

### assertFileEquals

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class FileEqualsTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        file_put_contents('a.txt', 'A');
        file_put_contents('b.txt', 'B');
        $this->assertFileEquals('a.txt', 'b.txt');
    }

    #[Test]
    public function testSuccess(): void
    {
        file_put_contents('c.txt', 'SAME');
        file_put_contents('d.txt', 'SAME');
        $this->assertFileEquals('c.txt', 'd.txt');
    }
}
```

## Iterable

### assertArrayHasKey

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ArrayHasKeyTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertArrayHasKey('missing', ['foo' => 'bar']);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertArrayHasKey('foo', ['foo' => 'bar']);
    }
}
```

### assertContains

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ContainsTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertContains(3, [1, 2]);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertContains(2, [1, 2, 3]);
    }
}
```

### assertContainsOnly

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ContainsOnlyTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertContainsOnly('string', ['a', 1]);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertContainsOnly('string', ['a', 'b']);
    }
}
```

## Objects

### assertObjectHasProperty

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ObjectHasPropertyTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $obj = (object)['a' => 1];
        $this->assertObjectHasProperty('b', $obj);
    }

    #[Test]
    public function testSuccess(): void
    {
        $obj = (object)['a' => 1];
        $this->assertObjectHasProperty('a', $obj);
    }
}
```

## Cardinality

### assertCount

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class CountTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertCount(3, [1, 2]);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertCount(2, [1, 2]);
    }
}
```

### assertSameSize

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class SameSizeTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertSameSize([1, 2], [1]);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertSameSize([1, 2], ['a', 'b']);
    }
}
```



## Types

### assertInstanceOf

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class InstanceOfTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertInstanceOf(DateTime::class, new stdClass());
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertInstanceOf(stdClass::class, new stdClass());
    }
}
```

### assertIsArray

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsArrayTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsArray('not array');
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsArray([1,2]);
    }
}
```

### assertIsList

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsListTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsList(['a' => 1]);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsList([1,2,3]);
    }
}
```

### assertIsBool

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsBoolTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsBool(1);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsBool(true);
    }
}
```

### assertIsCallable

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsCallableTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsCallable('not_callable');
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsCallable(fn() => true);
    }
}
```

### assertIsFloat

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsFloatTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsFloat(1);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsFloat(1.5);
    }
}
```

### assertIsInt

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsIntTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsInt(1.3);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsInt(3);
    }
}
```

### assertIsIterable

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsIterableTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsIterable('string');
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsIterable([1,2]);
    }
}
```

### assertIsNumeric

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsNumericTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsNumeric('abc');
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsNumeric('123');
    }
}
```

### assertIsObject

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsObjectTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsObject('string');
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsObject(new stdClass());
    }
}
```

### assertIsResource

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsResourceTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsResource('not_resource');
    }

    #[Test]
    public function testSuccess(): void
    {
        $resource = fopen('php://memory', 'r');
        $this->assertIsResource($resource);
    }
}
```

### assertIsString

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class IsStringTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertIsString(123);
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertIsString("hello");
    }
}
```

### assertNull

``` php
<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class NullTest extends TestCase
{
    #[Test]
    public function testFailure(): void
    {
        $this->assertNull('not null');
    }

    #[Test]
    public function testSuccess(): void
    {
        $this->assertNull(null);
    }
}
```
