# Glossaire

## A
**Assertion** 
Instruction utilisée dans un test pour vérifier qu’un résultat correspond à la valeur attendue.

Exemple : assertEqual(result, 42) vérifie que result vaut bien 42.
Il existe de nombreuses méthodes d'assertion proposées par les frameworks de Test, il vous faudra étudier la documentation, pour les découvrir et les maitriser.

**Automatisation des tests**
Processus qui consiste à exécuter automatiquement les tests (unitaires, d’intégration, etc.) via des outils ou des pipelines CI/CD.



## B
**Base de test (Test fixture)** 
Contexte ou environnement nécessaire à l’exécution d’un test (par exemple, des données préparées ou une configuration spécifique).

**Behavior-Driven Development (BDD)**
Méthode de développement centrée sur le comportement attendu du logiciel, exprimé dans un langage proche du naturel (ex. : Given / When / Then), utilisé pour les tests fonctionnels.
- (Given) (Etant donné) un contexte,
- (When) (Lorsque) l'utilisateur effectue certaines actions,
- (Then) (Alors) on doit pouvoir constater telles conséquences

Par exemple:
- Etant donné un solde positif de mon compte, et aucun retrait cette semaine,
- Lorsque je retire un montant inférieur à la limite de retrait,
- Alors mon retrait doit se dérouler sans erreur



## C
**Cas de test**
Scénario précis vérifiant une fonctionnalité donnée : il comprend une entrée, une action, et une sortie attendue.

**Coverage (Couverture de code)**
Pourcentage du code source exécuté par les tests. Les outils d’analyse de qualité et de sécurité, tels que SonarQube, recherchent une couverture la plus proche possible de 100%. Par exemple, SonarQube signale un défaut de conception lorsque la couverture du code est inférieure à 80%.


**CRAP**
Le CRAP score est un indicateur qui mesure à quel point une méthode est risquée et difficile à maintenir, en se basant sur deux éléments :
- La complexité du code (cyclomatic complexity)
- Le manque de tests unitaires (partie non couverte par les tests)

[CRAP.md](CRAP.md)


## D
**Dépendance**
Composant externe dont dépend une unité de code (ex. : base de données, API).
Les dépendances sont souvent simulées dans les tests unitaires via des mocks ou stubs.

**Dummy**
Un dummy est une doublure de test utilisée pour remplacer un objet dont on n’a pas réellement besoin pendant l’exécution du test. On l’emploie généralement quand une dépendance est indispensable pour instancier la classe à tester, mais que son comportement n’a aucune importance pour le scénario testé.


## F
**Fake**
Objet factice remplaçant un vrai composant mais avec une logique simplifiée.
Exemple : une base de données en mémoire utilisée à la place d’une vraie base SQL.



## M
**Mock**
Objet simulé qui imite le comportement d’une dépendance et permet de vérifier si certaines interactions ont eu lieu (ex. : si une méthode a été appelée).



## R
**Refactoring**
Réécriture du code pour l’améliorer sans modifier son comportement. Les tests unitaires garantissent que le code refactorisé reste correct.

**Regression Test (Test de régression)**
Test qui s’assure qu’une modification du code n’a pas introduit de nouveaux bugs dans des fonctionnalités existantes.



## S
**Setup / Teardown**
Méthodes exécutées avant (setup) et après (teardown) un test pour préparer et nettoyer l’environnement.

**Spy**
Type de mock qui enregistre les interactions pour vérifier a posteriori ce qui s’est passé (ex. : nombre d’appels, arguments passés).

**Stub**
Objet simulé qui renvoie des réponses prédéterminées sans logique interne.



## T
**Test Coverage Report**
Rapport détaillant le taux de couverture du code par les tests automatisés, généralement généré par des outils d’analyse de code ou de sécurité.

**Test-Driven Development (TDD)**
Méthodologie où les tests sont écrits avant le code, suivant le cycle : Red → Green → Refactor

**Test double**
Terme générique pour désigner tout objet simulé utilisé à la place d’une vraie dépendance (mock, stub, fake, spy).



## U
**Unité (Unit)**
La plus petite partie testable d’un programme (souvent une fonction, une méthode ).

**Unit Test (Test unitaire)**
Test qui vérifie le bon fonctionnement d’une seule unité de code, isolée du reste du système.
