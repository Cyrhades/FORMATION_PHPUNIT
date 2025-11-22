# L'élément <logging>

**Élément parent :** `<phpunit>`
L'élément `<logging>` et ses éléments enfants permettent de configurer la journalisation (logging) de l'exécution des tests.

```xml
<logging>
    <junit outputFile="junit.xml"/>
    <teamcity outputFile="teamcity.txt"/>
    <testdoxHtml outputFile="testdox.html"/>
    <testdoxText outputFile="testdox.txt"/>
</logging>
```

## L'élément `<junit>`
Élément parent : `<logging>`

Configure un fichier de résultats de tests au format JUnit XML.

### Attribut `outputFile`
Valeurs possibles : string
Description : Le fichier dans lequel le rapport de tests au format JUnit XML sera écrit.


## L'élément `<teamcity>`
Élément parent : `<logging>`
Configure un fichier de résultats de tests au format TeamCity.


### Attribut `outputFile`
Valeurs possibles : string
Description : Le fichier dans lequel le rapport de tests au format TeamCity sera écrit.


## L'élément `<testdoxHtml>`
Élément parent : `<logging>`
Configure un fichier de résultats de tests au format TestDox HTML.

### Attribut `outputFile`
Valeurs possibles : string
Description : Le fichier dans lequel le rapport de tests au format TestDox HTML sera écrit.

## L'élément `<testdoxText>`
Élément parent : `<logging>`
Configure un fichier de résultats de tests au format TestDox texte.

### Attribut `outputFile`
Valeurs possibles : string
Description : Le fichier dans lequel le rapport de tests au format TestDox texte sera écrit.