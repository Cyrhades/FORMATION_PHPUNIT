# Data Provider

Base: https://docs.phpunit.de/en/12.4/attributes.html#data-provider

Les providers permettent de charger une "série" d'arguments pour effectuer un même test.


## Data Provider
L'attribut DataProvider(string $methodName) peut être utilisé sur une méthode de test pour spécifier une méthode statique déclarée dans la même classe que la méthode de test en tant que fournisseur de données.

Déclaration et utilisation d'un DataProvider
```php
<?php declare(strict_types=1);
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class NumericDataSetsTest extends TestCase
{
    public static function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }
}
```


## DataProviderExternal
L'attribut DataProviderExternal(string $className, string $methodName) peut être utilisé sur une méthode de test pour spécifier une méthode statique déclarée dans une autre classe en tant que fournisseur de données.

Déclaration d'un DataProvider externe

```php
<?php declare(strict_types=1);
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class NumericDataSetsTestUsingExternalDataProvider extends TestCase
{
    #[DataProviderExternal(ExternalDataProvider::class, 'additionProvider')]
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }
}
// Peut évidement être dans un fichier dédié 'ExternalDataProvider.php'
final class ExternalDataProvider
{
    public static function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3],
        ];
    }
}
```

Il peut être judicieux d'avoir un répertoire dataProvider dans les tests, cela permettrait de pouvoir utiliser des jeux de tests dans plusieurs tests et de faciliter l'organisation des DataProvider.

Exemple d'oraginsation:
```
tests/
  ├── Unit/
  │     ├── Service/
  │     ├── Controller/
  │     └── dataProvider/
  |           └── User/
  │           │    ├── validUsers.php
  │           │    └── invalidUsers.php
  │           ├── Orders/
  │           └── Global/
  │── Integration/
  └── Fixtures/
```


## TestWith

L'attribut TestWith(array $data) peut être utilisé pour définir un fournisseur de données pour une méthode de test sans avoir à implémenter une méthode de fournisseur de données.


```php
<?php declare(strict_types=1);
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

final class DataTest extends TestCase
{
    #[TestWith([0, 0, 0])]
    #[TestWith([0, 1, 1])]
    #[TestWith([1, 0, 1])]
    #[TestWith([1, 1, 3])]
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }
}
```