# L'élément `<coverage>`

Parent: `<phpunit>`

L'élément `<coverage>` et ses enfants peuvent être utilisés pour configurer la couverture de code :

```xml
<coverage includeUncoveredFiles="true"
        pathCoverage="false"
        ignoreDeprecatedCodeUnits="true"
        disableCodeCoverageIgnore="true">
</coverage>
```

### Attribut ```includeUncoveredFiles```
Valeurs possibles: true ou false (par défaut: true)

Lorsque défini sur true, tous les fichiers de code source configurés pour être pris en compte dans l'analyse de la couverture de code seront inclus dans le(s) rapport(s) de couverture de code. Cela inclut les fichiers de code source qui ne sont pas exécutés pendant l'exécution des tests.

### Attribut `ignoreDeprecatedCodeUnits`
Valeurs possibles: true ou false (par défaut: false)

Cet attribut configure si les unités de code annotées avec @deprecated doivent être ignorées de la couverture de code.

### Attribut `pathCoverage`
Valeurs possibles: true ou false (par défaut: false)

Si défini sur false, seules les données de couverture de ligne seront collectées, traitées et rapportées.

Si défini sur true, les données de couverture de ligne, de couverture de branche et de couverture de chemin seront collectées, traitées et rapportées. Cela nécessite un pilote de couverture de code qui supporte la couverture de chemin. La couverture de chemin est actuellement implémentée uniquement par Xdebug.

### Attribut `disableCodeCoverageIgnore`
Valeurs possibles: true ou false (par défaut: false)

Cet attribut configure si les métadonnées pour ignorer le code doivent être ignorées.

## L'élément ```<report>```
Parent: ```<coverage>```

Configure les rapports de couverture de code à générer :

```xml
<report>
    <clover outputFile="clover.xml"/>
    <cobertura outputFile="cobertura.xml"/>
    <crap4j outputFile="crap4j.xml" threshold="50"/>
    <html outputDirectory="html-coverage" lowUpperBound="50" highLowerBound="90"/>
    <php outputFile="coverage.php"/>
    <text outputFile="coverage.txt" showUncoveredFiles="false" showOnlySummary="true"/>
    <xml outputDirectory="xml-coverage"/>
</report>
```


--------------------



## L'élément ```<clover>```
Parent: ```<report>```

Configure un rapport de couverture de code au format Clover XML.

### Attribut `outputFile` (string)
Le fichier dans lequel le rapport Clover XML est écrit.


--------------------


## L'élément ```<cobertura>```
Parent: ```<report>```

Configure un rapport de couverture de code au format Cobertura XML.

### Attribut `outputFile` (string)
Le fichier dans lequel le rapport Cobertura XML est écrit.


--------------------

## L'élément ```<crap4j>```
Parent: ```<report>```

Configure un rapport de couverture de code au format Crap4J XML.

### Attribut `outputFile` (string) 
Le fichier dans lequel le rapport Crap4J XML est écrit.

### Attribut `threshold` (integer, par défaut: 50)
Si l'indice CRAP calculé pour une unité de code (méthode ou fonction) est supérieur à la valeur du threshold, le rapport Crap4J la marquera comme "crap" (risquée) et suggérera qu'elle doit être refactorisée ou couverte par plus de tests.


--------------------

## L'élément ```<html>```
Parent: ```<report>```

Configure un rapport de couverture de code au format HTML.

### Attribut `outputDirectory` : 
Le répertoire dans lequel le rapport HTML est écrit.

### Attribut `lowUpperBound` (integer, par défaut: 50) : 
La borne supérieure de ce qui est considéré comme une "couverture faible".

### Attribut `highLowerBound` (integer, par défaut: 90) : 
La borne inférieure de ce qui est considéré comme une "couverture élevée".

### Attribut `colorSuccessHigh` (string, par défaut: #99cb84) : 
Couleur pour indiquer une ligne couverte par des tests petits (et plus grands).

### Attribut `colorSuccessMedium` (string, par défaut: #c3e3b5) : 
Couleur pour indiquer une ligne couverte par des tests moyens (et grands).

### Attribut `colorSuccessLow` (string, par défaut: #dff0d8) : 
Couleur pour indiquer une ligne couverte par des tests grands.

### Attribut `colorWarning` (string, par défaut: #fcf8e3) :
Couleur pour indiquer qu'une ligne de code ne peut pas être couverte.

### Attribut `colorDanger` (string, par défaut: #f2dede) : 
Couleur pour indiquer qu'une ligne de code peut être couverte mais n'est pas couverte.

### Attribut `customCssFile` (string) : 
Le chemin d'accès à un fichier CSS personnalisé.

--------------------

## L'élément ```<php>```
Parent: ```<report>```

Configure un rapport de couverture de code au format PHP.

### Attribut `outputFile` (string) : 
Le fichier dans lequel le rapport PHP est écrit.

--------------------

## L'élément ```<text>```
Parent: ```<report>```

Configure un rapport de couverture de code au format texte.

### Attribut `outputFile` (string) : 
Le fichier dans lequel le rapport texte est écrit.

### Attribut `showUncoveredFiles` (booléen, par défaut: false)

### Attribut `showOnlySummary` (booléen, par défaut: false)

--------------------

## L'élément ```<xml>```
Parent: ```<report>```

Configure un rapport de couverture de code au format PHPUnit XML.

### Attribut `outputDirectory` (string) : 
Le répertoire dans lequel le rapport PHPUnit XML est écrit.