# Les tests unitaires avec PHPUnit

## Présentation de PHPUnit
**PHPUnit** est le **framework de référence** pour les tests unitaires en PHP.
Il s’intègre facilement avec Composer et la plupart des frameworks PHP (Laravel, Symfony, etc.).



## Installation PHPUnit
Pour installer **PHPUnit** vous devez avoir PHP installé, mais attention, en fonction de votre version PHP il faudra installer une version compatible de **PHPUnit**.

```
⚠️ On adapte PHPUnit à PHP, et non l’inverse.
```

Oui il ne faut pas modifier votre version PHP pour s'adapter à PHPUnit, mais adapter PHPUnit à votre version PHP. Tout simplepment car vous devez avoir sur votre environnement de dev la même version PHP que sur votre environnement en production. Et même si cela peut paraitre évident phjpUnit ne sera installé que sur la version de dev ou de tests


Compatibilité avec la version PHP
---------------------------------
- PHPUnit 12, >= PHP 8.3
- PHPUnit 11, >= PHP 8.2
- PHPUnit 10, >= PHP 8.1
- PHPUnit 9, >= PHP 7.3
- PHPUnit 8, >= PHP 7.2


Ne devrait plus être utilisé
-----------------------------
- PHPUnit 7, PHP 7.1 - PHP 7.3
- PHPUnit 6, PHP 7.0 - PHP 7.2
- PHPUnit 5, PHP 5.6 - PHP 7.1
- PHPUnit 4, PHP 5.3 - PHP 5.6



### Exemple d'installation

> composer require --dev phpunit/phpunit ^12



Exemple de **composer.json**

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "require-dev": {
        "phpunit/phpunit": "12"
    }
}
```


En vous basant sur l'exemple de la documentation de PHPUnit, réalisons notre premier test:

```php
<?php declare(strict_types=1);

namespace App;

final class Greeter
{
    public function greet(string $name): string
    {
        return 'Hello, ' . $name . '!';
    }
}
```

Si besoin d'aide pour le premier test :
https://docs.phpunit.de/en/12.4/writing-tests-for-phpunit.html#writing-tests-for-phpunit-examples-greetertest-php

