# L’élément `<phpunit>` 
 `<phpunit>` est l'élément principal du fichier XML, on peut y ajouter des attributs.

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/11.4/phpunit.xsd">
</phpunit>
```


## Attribut `backupGlobals`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
PHPUnit peut sauvegarder toutes les variables globales et superglobales avant chaque test, puis les restaurer après chaque test.  
Cette configuration peut être surchargée via `BackupGlobals`.

---

## Attribut `backupStaticProperties`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
Sauvegarde et restauration des propriétés statiques de toutes les classes avant et après chaque test.  
Peut être surchargé via `BackupStaticProperties`.

---

## Attribut `bootstrap`
Configure le script de bootstrap chargé avant les tests (souvent l’autoloader du code testé).

---

## Attribut `cacheDirectory`
Répertoire dans lequel PHPUnit stocke son cache (résultats, analyses, etc.).

---

## Attribut `cacheResult`
**Valeurs possibles :** `true` ou `false` *(par défaut : true)*  
Active la mise en cache des résultats des tests (nécessaire pour `executionOrder` par défauts ou durées).

---

## Attribut `colors`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
Active l’affichage en couleur dans la sortie de PHPUnit.  
Équivalent à `--colors=auto` ou `--colors=never`.

---

## Attribut `columns`
**Valeurs possibles :** entier ou `max` *(par défaut : 80)*  
Définit le nombre de colonnes pour l'affichage de progression.  
`max` = largeur maximale du terminal.

---

## Attribut `controlGarbageCollector`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
Contrôle manuel du garbage collector : désactivation, exécutions périodiques, réactivation après les tests.  
Le nombre de tests entre chaque GC est défini dans `numberOfTestsBeforeGarbageCollection`.

---

## Attribut `numberOfTestsBeforeGarbageCollection`
**Valeurs possibles :** entier *(par défaut : 100)*  
Nombre de tests exécutés avant déclenchement du garbage collector.

---

## Attribut `requireCoverageMetadata`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
Un test est marqué comme risqué s'il n'indique pas explicitement le code couvert.

---

## Attribut `processIsolation`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
Chaque test est exécuté dans un processus PHP séparé.

---

## Attributs `stopOn*`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
Arrêt immédiat de la suite de tests en cas de :  
- `stopOnDefect` : défaut  
- `stopOnError` : erreur  
- `stopOnFailure` : échec  
- `stopOnWarning` : avertissement  
- `stopOnRisky` : test risqué  
- `stopOnDeprecation` : dépréciation  
- `stopOnNotice` : notice  
- `stopOnSkipped` : test sauté  
- `stopOnIncomplete` : test incomplet

---

## Attributs `failOn*`
**Valeurs possibles :** `true` ou `false` *(par défaut : false)*  
Indiquent à PHPUnit de retourner un code de sortie d’échec même si les tests sont réussis, si :  
- `failOnAllIssues` : un problème de n’importe quel type apparaît  
- `failOnEmptyTestSuite` : aucune suite n’est trouvée  
- `failOnWarning` : avertissements  
- `failOnRisky` : tests risqués  
- `failOnDeprecation` : dépréciations  
- `failOnPhpunitDeprecation` : dépréciations PHPUnit  
- `failOnNotice` : notices  
- `failOnSkipped` : tests sautés  
- `failOnIncomplete` : tests incomplets  

*(Note : activer `failOnAllIssues` accepte implicitement les nouveaux types de problèmes des versions futures)*

---

## Attribut `beStrictAboutChangesToGlobalState`
Marque un test comme risqué si l’état global est modifié.

## Attribut `beStrictAboutOutputDuringTests`
Marque un test comme risqué si du texte est affiché (echo, print, etc.).

## Attribut `beStrictAboutTestsThatDoNotTestAnything`
**Par défaut : true**  
Test risqué s’il n’a aucune assertion.

## Attribut `beStrictAboutCoverageMetadata`
Test risqué si du code non déclaré couvert est exécuté.

---

# Limites de temps

## Attribut `enforceTimeLimit`
Active la prise en compte des limites de temps.

## Attribut `defaultTimeLimit`
Limite par défaut (en secondes).

## Attribut `timeoutForSmallTests`
Valeur par défaut : `1` seconde.

## Attribut `timeoutForMediumTests`
Valeur par défaut : `10` secondes.

## Attribut `timeoutForLargeTests`
Valeur par défaut : `60` secondes.

---

## Attribut `defaultTestSuite`
Nom de la suite de tests par défaut.

---

## Attribut `stderr`
Affiche la sortie de PHPUnit sur `stderr` au lieu de `stdout`.

---

## Attribut `reverseDefectList`
Affiche les tests échoués dans l’ordre inverse.

---

## Attribut `registerMockObjectsFromTestArgumentsRecursively`
Analyse récursive des arguments dépendant entre tests pour y détecter des mocks.

---

## Attribut `extensionsDirectory`
Dossier contenant les `.phar` d’extensions à charger automatiquement.

---

# Ordre d’exécution — `executionOrder`

**Valeurs possibles :**  
`default`, `defects`, `depends`, `no-depends`, `duration`, `random`, `reverse`, `size`  
*(séparés par virgule)*

- `default` : ordre naturel  
- `defects` : tri par défauts (cache requis)  
- `depends` : tests sans dépendances → puis dépendants  
- `duration` : plus rapides → plus lents (cache requis)  
- `random` : ordre aléatoire  
- `reverse` : ordre inversé  
- `size` : small → medium → large  

Variantes combinées :  
- `depends,defects`  
- `depends,duration`  
- `depends,random`  
- `depends,reverse`  
- `no-depends,defects`  
- `no-depends,duration`  
- `no-depends,random`  
- `no-depends,reverse`  
- `no-depends,size`

---

## Attribut `resolveDependencies`
Active la résolution des dépendances exprimées via `Depends*`.  
*(par défaut : true)*

---

## Attribut `testdox`
Active la sortie TestDox.

## Attribut `testdoxSummary`
Affiche un récapitulatif TestDox des tests non réussis.

---

# Affichage des détails — `displayDetailsOn*`

Détermine si les détails doivent être affichés pour :  
- tests incomplets  
- tests sautés  
- tests déclenchant une dépréciation  
- dépréciations PHPUnit  
- tests déclenchant des erreurs  
- tests déclenchant des notices  
- tests déclenchant des warnings  

`displayDetailsOnAllIssues` active tous les détails (note : évolutif selon versions).

---

## Attribut `shortenArraysForExportThreshold`
**Valeurs possibles :** entier *(par défaut : 0)*  
Limite le nombre d’éléments affichés lors de l’export d’un tableau.  
`0` = illimité.
