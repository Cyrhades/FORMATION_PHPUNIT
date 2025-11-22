# Le `<source>` Element

**Élément parent :** `<phpunit>`

Configure les fichiers du code source du projet. Cela permet de restreindre l’analyse de couverture et le reporting des dépréciations, notices et warnings à votre propre code, tout en excluant le code tiers.

On appelle “first-party code” le code configuré ici. Tout le reste est considéré comme “third-party code”.

---

## Le `<include>` Element

**Élément parent :** `<source>`

Configure des fichiers à inclure dans la liste des fichiers de code source du projet.

```xml
<include>
    <directory suffix=".php">src</directory>
</include>
```
Inclut tous les fichiers .php dans src et ses sous-dossiers.

---

## Le `<exclude>` Element

**Élément parent :** `<source>`

Configure des fichiers à exclure de la liste des fichiers de code source.
```xml
<include>
    <directory suffix=".php">src</directory>
</include>

<exclude>
    <directory suffix=".php">src/generated</directory>
    <file>src/autoload.php</file>
</exclude>
```
L'exemple ci-dessus indique à PHPUnit d'inclure tous les fichiers de code source avec l'extension `.php` dans le répertoire `src` et ses sous-répertoires, mais d'exclure tous les fichiers avec l'extension `.php` dans le répertoire `src/generated` et ses sous-répertoires, ainsi que le fichier `src/autoload.php`.

---


## Le `<directory>` Element

Parent elements : `<include>`, `<exclude>`

Configure un dossier (et sous-dossiers) pour `inclusion` ou `exclusion`.

## Attribut `prefix`

Valeurs possibles : string

Filtre les fichiers par préfixe.


## Attribut `suffix`

Valeurs possibles : string — défaut : `.php`

Filtre les fichiers par suffixe.

## L’élément `<file>`

Parent elements : `<include>`, `<exclude>`

Configure un fichier unique pour inclusion/exclusion.


## L’élément `<deprecationTrigger>`

**Élément parent :** `<source>`

Configure des fonctions ou méthodes servant de wrappers autour de trigger_error() comme point d’origine de dépréciations.

## L’élément `<function>`

**Élément parent :** `<deprecationTrigger>`
```xml
<deprecationTrigger>
    <function>trigger_deprecation</function>
</deprecationTrigger>
```

Définit trigger_deprecation() comme déclencheur de dépréciation.

## L’élément `<method>`

**Élément parent :** `<deprecationTrigger>`

```xml
<deprecationTrigger>
    <method>DeprecationTrigger::triggerDeprecation</method>
</deprecationTrigger>
```

Définit DeprecationTrigger::triggerDeprecation() comme déclencheur de dépréciation.

-------------

Attributs associés aux dépréciations, notices et warnings
ignoreSelfDeprecations

Ignore les dépréciations (E_DEPRECATED, E_USER_DEPRECATED) déclenchées par le code first-party dans le code first-party.
Défaut : false

ignoreDirectDeprecations

Ignore les dépréciations déclenchées par le code first-party dans le code tiers.
Défaut : false

ignoreIndirectDeprecations

Ignore les dépréciations déclenchées par le code tiers.
Défaut : false — Recommandé : true

restrictNotices

Restreint l’affichage de E_STRICT, E_NOTICE, E_USER_NOTICE au first-party code.
Défaut : false

restrictWarnings

Restreint l’affichage de E_WARNING, E_USER_WARNING au first-party code.
Défaut : false

baseline

Valeurs : string
Chemin vers un fichier baseline utilisé lors de l’exécution des tests.

ignoreSuppressionOfDeprecations

Ignore la suppression @ des E_USER_DEPRECATED.
Défaut : false

ignoreSuppressionOfPhpDeprecations

Ignore la suppression @ des E_DEPRECATED.
Défaut : false

ignoreSuppressionOfErrors

Ignore la suppression @ des E_USER_ERROR.
Défaut : false

ignoreSuppressionOfNotices

Ignore la suppression @ des E_USER_NOTICE.
Défaut : false

ignoreSuppressionOfPhpNotices

Ignore la suppression @ des E_STRICT et E_NOTICE.
Défaut : false

ignoreSuppressionOfWarnings

Ignore la suppression @ des E_USER_WARNING.
Défaut : false

ignoreSuppressionOfPhpWarnings

Ignore la suppression @ des E_WARNING.
Défaut : false