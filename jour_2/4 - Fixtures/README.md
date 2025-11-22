# Fixtures


## setUp() et tearDown()

Même si setUp() et tearDown() semblent fonctionner en miroir, dans la pratique ce n’est pas vraiment le cas.
En général, vous n’avez pas besoin d’écrire un tearDown(). Vous n’en aurez l’utilité que si votre setUp() crée des ressources externes comme des fichiers, des connexions réseau ou tout autre élément qui doit être explicitement fermé ou libéré.

Dans la majorité des tests, setUp() suffit largement.

Cependant, si votre setUp() crée de grosses structures d’objets (par exemple plusieurs objets liés entre eux) et que vous les stockez dans des propriétés de la classe de test, il peut être utile d’ajouter un tearDown() pour faire un unset() de ces propriétés. Cela permet au garbage collector de libérer la mémoire plus rapidement, au lieu d’attendre la fin complète du processus PHP lancé par PHPUnit.


## Partager des fixtures 

Il arrive parfois que l’on souhaite partager une même « fixture » — c’est-à-dire un ensemble de données ou de ressources initialisées — entre plusieurs tests. Mais dans la majorité des cas, ça ne devrait pas être nécessaire.

Quand le partage de fixture peut être utile, il existe tout de même quelques cas où partager une ressource entre plusieurs tests a du sens.
Un bon exemple :
- une connexion à la base de données. Plutôt que d’ouvrir une nouvelle connexion pour chaque test (ce qui ralentirait l’exécution), on peut en créer une seule fois avant tous les tests, puis la réutiliser.

Pour cela, PHPUnit fournit deux méthodes spéciales :

- **setUpBeforeClass()** : exécutée une seule fois avant tous les tests de la classe
- **tearDownAfterClass()** : exécutée une seule fois après tous les tests de la classe

Attention : pas d’assertions dans ces méthodes

Il est très important de ne jamais mettre d’assertions dans setUpBeforeClass() ou tearDownAfterClass().
Si vous le faites, le comportement du test devient imprévisible, et PHPUnit ne vous avertira même pas, pour des raisons de performance.

Exemple simple

Voici comment on pourrait ouvrir puis fermer une connexion SQLite partagée :
```php
final class DatabaseTest extends TestCase
{
    private static $dbh;

    public static function setUpBeforeClass(): void
    {
        self::$dbh = new PDO('sqlite::memory:');
    }

    public static function tearDownAfterClass(): void
    {
        self::$dbh = null;
    }
}
```

### Pourquoi éviter de partager des fixtures ?

Même si cela peut paraître pratique, partager des fixtures affaiblit la qualité de vos tests.
Pourquoi ? Parce que cela crée une dépendance entre vos tests : s’ils utilisent tous le même état partagé, ils deviennent moins fiables, moins indépendants et plus difficiles à maintenir.

La meilleure solution consiste donc à améliorer votre conception et, si besoin, à utiliser des stubs ou autres test doubles (que vous verrons par la suite) pour remplacer les dépendances lourdes.

**En résumé :**
Partager des fixtures est utile uniquement dans quelques cas spécifiques (ex: connexion DB). Cela doit rester exceptionnel. Vos Tests doivent être indépendants, ils seront ainsi plus robustes.


## Gérer l’état global dans PHPUnit (Global State)

Tester du code qui utilise des singletons, des variables globales ou des propriétés statiques peut devenir compliqué.
Pourquoi ? Parce que ces éléments appartiennent tous à ce qu’on appelle l’état global, et cet état reste partagé entre les tests… ce qui peut facilement créer des effets de bord.


### Pourquoi l’état global pose problème ?

Quand un test modifie une variable globale ou une propriété statique, un autre test peut en subir les conséquences.
Cela rend les tests fragiles, imprévisibles et difficiles à maintenir.


### Comment fonctionnent les variables globales en PHP ?

Une variable globale ```$foo = 'bar';``` est en réalité equivalent à ```$GLOBALS['foo'] = 'bar';```
```$GLOBALS``` est une superglobale, accessible partout.

Depuis une fonction, on peut donc y accéder directement via ```$GLOBALS['foo']``` ou en definissant ```global $foo;``` au début de la fonction.

Les propriétés statiques des classes font également partie de l'état global.


### Isoler l’état global
Pour éviter que les modifications d’un test contaminent les autres, PHPUnit peut automatiquement sauvegarder et restaurer : Les variables globales et superglobales ($GLOBALS, $_ENV, $_POST, $_GET, $_COOKIE, $_SERVER, $_FILES, $_REQUEST)

Pour activer cet état vous pouvez au démarrage de la ligne de commande ajouter ```--globals-backup```

Vous pouvez également le préciser dans la configuration (phpunit.xml) :<phpunit backupGlobals="true">

-----

Pour réinitialiser les propriétés statiques de toutes les classes  vous pouvez au démarrage de la ligne de commande ajouter ```--static-backup```

Vous pouvez également le préciser dans la configuration (phpunit.xml) : <phpunit backupStaticProperties="true">


```
⚠️ Limites importantes

La sauvegarde utilise serialize(), donc si un objet n'est pas sérialisable et se trouve dans $GLOBALS, la sauvegarde échoue.

Exemple : $GLOBALS['db'] = new PDO(...);
```


Une autre solution étant d'utiliser des attributs :

Pour les variables globales
- #[BackupGlobals(true|false)]
- #[ExcludeGlobalVariableFromBackup('nom')]


Pour les propriétés statiques
- #[BackupStaticProperties(true|false)]
- #[ExcludeStaticPropertyFromBackup(className: 'Class', propertyName: 'prop')]


```
⚠️ Attention aux pièges

La sauvegarde des propriétés statiques ne connaît pas les “valeurs par défaut”

Si un test modifie une propriété statique avant que le backup ne soit activé, cette valeur modifiée devient la nouvelle valeur “référence”.

Les classes chargées dynamiquement dans un test ne peuvent pas voir leurs propriétés statiques restaurées, car PHPUnit ne connaît pas leur état initial.
```


Si vous souhaitez garantir l'état initial d'une donnée globale, vous pouvez simplement utiliser ```setUp```.
Exemple:
```php
protected function setUp(): void
{
    $GLOBALS['foo'] = 100;
    MyClass::$counter = 0;
}
```