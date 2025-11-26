# Couverture de Code

En informatique, la couverture de code est une mesure utilisée pour décrire le degré auquel le code source d’un programme est testé par une suite de tests. Un programme avec une couverture de code élevée a été testé plus en profondeur et a moins de chances de contenir de bugs qu’un programme avec une faible couverture de code.

Dans ce chapitre, vous apprendrez comment fonctionne la couverture de code de PHPUnit, qui fournit un aperçu des parties du code de production exécutées lorsque les tests sont lancés. Elle utilise la bibliothèque php-code-coverage, laquelle s’appuie sur les fonctionnalités de couverture offertes par les extensions **PCOV** ou **Xdebug** pour PHP.

```
Si vous voyez un avertissement lors de l’exécution des tests indiquant qu’aucun moteur de couverture de code n’est disponible, cela signifie que vous utilisez le binaire PHP CLI (php) et que ni PCOV ni Xdebug ne sont chargés.
```


```
Si vous souhaitez utiliser Xdebug pour collecter des données de couverture de code, vous devez activer le mode coverage de Xdebug.
```

PHPUnit peut générer un rapport de couverture en format HTML ainsi que des fichiers journaux XML contenant des informations de couverture dans divers formats (Clover, Cobertura, Crap4J, PHPUnit). Les informations de couverture peuvent également être affichées sous forme de texte (imprimées dans STDOUT) et exportées en code PHP pour un traitement ultérieur.



## Métriques de Couverture de Code

Plusieurs métriques logicielles existent pour mesurer la couverture de code :
- **Couverture de lignes (Line Coverage)**  Mesure si chaque ligne exécutable a été exécutée.
- **Couverture de branches (Branch Coverage)** Mesure si l’expression booléenne de chaque structure de contrôle a évalué à la fois ```true``` et ```false``` lors de l’exécution de la suite de tests.
- **Couverture de chemins (Path Coverage)** Mesure si chacun des chemins d’exécution possibles dans une fonction ou méthode a été suivi lors de l’exécution de la suite de tests. Un chemin d’exécution est une séquence unique de branches depuis l’entrée de la fonction/méthode jusqu’à sa sortie.

- **Couverture de fonctions et de méthodes** Mesure si chaque fonction ou méthode a été invoquée.
php-code-coverage considère une fonction ou méthode comme couverte uniquement lorsque toutes ses lignes exécutables sont couvertes.

- **Couverture de classes et de traits** Mesure si chaque méthode d’une classe ou d’un trait est couverte.
Une classe ou un trait n’est considéré comme couvert que lorsque toutes ses méthodes le sont.

- **Indice CRAP (Change Risk Anti-Patterns)** L’indice CRAP est calculé à partir de la complexité et de la couverture de code d’une unité de code. Du code peu complexe et suffisamment couvert aura un faible indice CRAP. On peut réduire cet indice en écrivant des tests supplémentaires ou en réduisant la complexité du code.

La bibliothèque utilisée par PHPUnit supporte toutes les métriques ci-dessus.
Pour obtenir la couverture des branches et des chemins, il faut collecter les données avec Xdebug, car PCOV ne supporte que la couverture de lignes.



## Inclusion des fichiers

Il est obligatoire de configurer quels fichiers de code source vous considérez comme les vôtres et que vous souhaitez inclure dans le rapport de couverture.
Comme d’autres fonctionnalités de PHPUnit ont aussi besoin de savoir quels fichiers vous appartiennent, il est recommandé de faire cette configuration dans le fichier XML (voir The <include> Element).
Alternativement, vous pouvez utiliser l’option en ligne de commande --coverage-filter.

Le paramètre de configuration includeUncoveredFiles permet de contrôler le comportement du filtre :

includeUncoveredFiles="true" (défaut) :
Tous les fichiers sont inclus dans le rapport, même si aucune ligne n’a été exécutée.

includeUncoveredFiles="false" :
Seuls les fichiers ayant au moins une ligne exécutée apparaissent dans le rapport.

Pour obtenir un rapport complet et honnête, il est fortement recommandé d’utiliser la valeur par défaut.