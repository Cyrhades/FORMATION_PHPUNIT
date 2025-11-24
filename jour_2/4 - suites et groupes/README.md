# Suites et Groupes dans PHPUnit

Quand on commence à avoir beaucoup de tests, on veut parfois pouvoir exécuter seulement un sous-ensemble des tests organiser les tests selon leur rôle (unitaires, intégration, lent, critique, etc.)

## Les Groupes (Groups)

Les groupes permettent d’étiqueter des tests pour pouvoir les exécuter de façon sélective.


Avec un attribut PHP 8+
```php
#[Group('fast')]
public function testSomethingFast(): void
{
    $this->assertTrue(true);
}
```

On peut mettre plusieurs groupes :
```php
#[Group('integration')]
#[Group('database')]
public function testDBInsert(): void
{
}
```

Lancer uniquement les tests du groupe fast : `phpunit --group fast`

## Les Suites (Test Suites)
Dans cas des suites on organise en fonction d'un répertoire.

### Exemple phpunit.xml
```xml
<phpunit>
    <testsuites>
        <testsuite name="unit">
            <directory>tests/Unit</directory>
        </testsuite>

        <testsuite name="integration">
            <directory>tests/Integration</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

Exécuter une suite:  `phpunit --testsuite unit`


### Exemple phpunit.xml avec suite et groupe
```xml
<phpunit>
    <testsuites>
        <testsuite name="unit">
            <directory>tests</directory>
        </testsuite>

        <testsuite name="integration">
            <directory>tests/Integration</directory>
        </testsuite>
    </testsuites>

    <groups>
        <include>
            <group>critical</group>
        </include>
        <exclude>
            <group>slow</group>
        </exclude>
    </groups>
</phpunit>
```

Ici :
- Tous les tests sont dans la suite default
- La suite integration ne fera tourner que les tests dans le dossier dédié
- Par défaut, on inclut critical et on exclut slow (même sans option CLI)



# Groupes spéciaux définis par PHPUnit
PHPUnit prévoit certains groupes réservés, que tu peux utiliser ou ignorer.

Les plus connus : small / medium / large

Ce sont des groupes officiels avec une signification particulière :
- small: doit être très rapide (≤ 1 seconde)
- medium: peut être un peu lent (≤ 10 secondes)
- large: tests lourds ou d’intégration (BDD, I/O…)

Exemple :
```php
#[Small]
public function testIsFast(): void {}
```

Lancer uniquement les tests small :
phpunit --group small

