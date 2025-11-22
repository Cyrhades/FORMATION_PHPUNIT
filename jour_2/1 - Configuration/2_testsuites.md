# L’élément `<testsuites>`

**Élément parent :** `<phpunit>`

Cet élément est le parent pour un ou plusieurs éléments `<testsuite>` servant à configurer les tests à exécuter.

---

# L’élément `<testsuite>`
**Élément parent :** `<testsuites>`

Un élément `<testsuite>` doit posséder un attribut `name` et peut contenir un ou plusieurs éléments enfants `<directory>` et/ou `<file>` qui indiquent les répertoires et/ou fichiers dans lesquels PHPUnit doit rechercher les tests.

Les fichiers et répertoires peuvent être exclus via des éléments `<exclude>`.

### Exemple :

```xml
<phpunit bootstrap="vendor/autoload.php">
  <testsuites>
    <testsuite name="unit">
      <directory>tests/unit</directory>
    </testsuite>

    <testsuite name="integration" bootstrap="tests/integration/bootstrap.php">
      <directory>tests/integration</directory>
    </testsuite>
  </testsuites>
</phpunit>
```

# Attribut `bootstrap`
L'attribut bootstrap peut être utilisé pour configurer un script d'amorçage supplémentaire pour une suite de tests.


# Attributs `phpVersion` et `phpVersionOperator`
```xml
<testsuites>
  <testsuite name="unit">
    <directory phpVersion="8.0.0" phpVersionOperator=">=">tests/unit</directory>
  </testsuite>
</testsuites>
```
Dans l'exemple ci-dessus, les tests du répertoire `tests/unit` ne sont ajoutés à la suite de tests que si la version de PHP est au moins 8.0.0. L'attribut `phpVersionOperator` est facultatif et sa valeur par défaut est >=.



# Attribut `groups`

Les tests trouvés à l'aide des éléments `<directory>` et `<file>` peuvent être ajoutés à une liste de groupes séparés par des virgules :
```xml
<testsuites>
  <testsuite name="unit">
    <directory groups="foo,bar">tests/foo-bar</directory>
  </testsuite>
</testsuites>
```
