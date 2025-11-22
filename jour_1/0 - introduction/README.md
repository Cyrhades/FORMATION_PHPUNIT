# Introduction


## Pourquoi tester ?

Les tests ne sont pas une contrainte, mais un outil de qualité et de confiance.

Raisons principales :
- Détection précoce des bugs
→ Corriger un bug en phase de dev coûte 10x moins qu’en production.
- Sécuriser les refactorings
→ On peut modifier le code sans crainte.
- Accélérer les livraisons
→ Automatisation = feedback rapide.
- Améliorer la conception
→ Le code devient plus clair, modulaire et testable.
- Faciliter la collaboration
→ Les tests documentent le comportement attendu.



## Les différents types de tests
- Tests **Unitaire** : Vérifier un comportement isolé (1 fonction / méthode).
- Tests **Intégration** : Vérifier l’interaction correcte (Plusieurs composants).
- Tests **fonctionnels** : Vérifier un scénario utilisateur (Fonction métier complète).
- Tests **end-to-end (E2E)** : Application "entière" (Simuler un parcours réel utilisateur).


Plus on monte dans la pyramide, plus les tests sont lents et coûteux à maintenir.


### Tests fonctionnels (au sens fonctionnel métier)
Des tests restent fonctionnels si :
Le test vérifie un fonctionnement métier de bout en bout du point de vue de l’utilisateur,
Sans ce soucier de l’architecture interne, même si cela traverse plusieurs couches (front, back, BDD).

**Exemple** : L’utilisateur peut créer un compte et recevoir un email de confirmation.

Même si ça touche plusieurs composants, ça reste un test fonctionnel, car le critère principal est ce que l’utilisateur est censé pouvoir faire.


### Tests d’intégration
On parle plutôt de tests d’intégration si :
Le test valide la communication entre plusieurs composants techniques,
Par exemple : Service A → API B → BDD,

Sans forcément simuler un comportement utilisateur complet.
**Exemple** : Le service Auth contact l’API Email correctement et envoie une payload valide.
L’objectif n’est pas métier mais technique.



## BDD (Behavior-Driven Development)
Le principe étant de tester ce que le logiciel doit faire du point de vue de l’utilisateur ou du métier.

Le Behavior Testing se concentre sur :
- les règles métier
- les scénarios d’usage
- le comportement observable

ce qui a de la valeur pour l’utilisateur.

On ne teste pas la structure interne, l’implémentation ou les détails techniques, mais le résultat final.

En BDD, on utilise souvent une syntaxe du type :
Given / When / Then (Étant donné que / Quand / Alors)

> Given: Étant donné qu’un utilisateur n’est pas encore inscrit

> When: Quand il remplit et valide le formulaire d’inscription

> Then: Alors un compte doit être créé
Et un email de confirmation doit être envoyé

### Avantages du BDD
- Facilite la communication entre développeurs, Product Owner, testeurs.
- Clarifie les attentes métier.
- Diminue les ambiguïtés fonctionnelles.



## TDD (Test Driven Development)

Cycle TDD classique :
- 🔴 Red → Écrire un test qui échoue.
- 🟢 Green → Écrire le code minimal pour le faire passer.
- 🔵 Refactor → Améliorer le code en gardant le test vert.

### Avantages du TDD

Le code est testé à 100 % dès sa création.

Le design émerge naturellement : on écrit du code plus clair et découplé, il est directement adapté aux tests.

Feedback immédiat, meilleure confiance.


## Principes en Tests

### F.I.R.S.T : 
- F: Fast, Les tests doivent être rapides
- I: Independent, Ne pas dépendre d’un autre test
- R: Repeatable, Donne le même résultat à chaque exécution
- S: Self-Validating, Résultat binaire (succès / échec)
- T: Timely, Écrits au bon moment (avant ou pendant le code)


---------------------------------------------------------------------------

### Le pattern AAA 
*source: (Gaël) https://www.hubvisory.com/fr/blog/le-aaa-cest-quoi .*

Le pattern AAA a pour but d'améliorer la structure des tests unitaires pour les rendre plus lisibles et augmenter leur maintenabilité, tout en poussant les developpeurs à écrire des tests plus concis.

De plus, ce pattern est une application des principe de responsabilité unique (Single-responsibility protocol) et FIRST (Fast Independant Repetable Self-validating, Timely) sur la partie testing.

En effet, si l'on respecte le pattern AAA, on aura une grande quantité de petits tests rapides a executer, chacun ayant pour but de vérifier un cas de test précis, plutôt que d'avoir des tests vérifiant plusieurs cas en même temps.


**Arrange**

C'est la phase d'initialisation de notre cas de test. Dans cette section, on va créer et initialiser les variables qui seront utilisées pendant le deroulé du test, mettre en place nos mocks... Il ne faut pas confondre cette phase avec la phase d'intialisation concernant tout un jeu de test, réalisée par exemple avec la méthode beforeEach. En effet, cette méthode vient en amont du pattern AAA, car elle vient faire une initialisation générale pour tout notre jeu de test, contrairement à la phase Arrange, dont le but est de faire l'initialisation pour un seul cas de test.



**Act**

C'est la phase d'action de notre cas de test. Dans cette phase, on va effectuer les instructions dont on cherche à valider le comportement. Si l'on prend l'exemple d'un formulaire de connexion, on va utiliser des instructions permettant de remplir le nom d'utilisateur et le mot de passe, puis de cliquer sur le bouton "Se connecter", pour tenter de valider le cas de test où le nom d'utilisateur et le mot de passe sont bons et l'utilisateur réussi à se connecter.


**Assert**

C'est la phase de vérification de notre cas de test. Dans cette partie, on va effectuer des vérifications permettant de s'assurer que les actions effectuées a la phase précédente ont bien eu l'impact escompté. Si je reprends l'exemple du formulaire de connexion, si le nom d'utilisateur et le mot de passe sont incorrects, je m'attends à avoir un message d'erreur et au contraire si le nom d'utilisateur et le mot de passe sont bons, alors je m'attends à être redirigé vers la page d'accueil. Je peux donc tester l'apparition d'un message d'erreur, ou bien le fait d'être redirigé vers la page d'accueil, selon le cas que je souhaite tester.

Lorsque l'on utilise le pattern AAA pendant l'écriture d'un test, l'objectif est de faire en sorte que chacune de ces 3 parties n'apparaisse qu'une fois, dans l'ordre des 3 sections ci-dessus (Arrange, Act puis Assert). Cela pousse la personne développant le test à faire preuve d'une plus grande rigueur lors de l'écriture pour respecter ce pattern.