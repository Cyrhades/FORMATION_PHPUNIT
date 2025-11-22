# Le métrique CRAP : comprendre précisément

Comment peut-on quantifier le risque lié à une modification du code ? Il existe de nombreuses manières de le faire, mais regardons la formule du CRAP score.

Le score CRAP s’applique aux méthodes : on le note donc **CRAP(m)**.

On définit :
- **CC(m)** = la complexité cyclomatique de la méthode
- **U(m)** = le pourcentage de la méthode non couvert par les tests unitaires

La formule est : ```CRAP(m) = CC(m)² × U(m)³ + CC(m)```

Voyons ce que cela signifie.

Pour calculer le CRAP d’une méthode, on a besoin :
- de la complexité cyclomatique ;
- de son taux de non-couverture (c’est-à-dire le pourcentage de code non testé).

On multiplie ensuite :
- le carré de la complexité
- par le cube du taux de non-couverture

Puis on ajoute à cela la complexité cyclomatique.

--------------

La complexité cyclomatique mesure le nombre de chemins possibles dans une méthode.
Plus il y a de conditions, boucles, branches… plus elle augmente.

La couverture de tests indique dans quelle mesure les tests traversent ces chemins.

Le score CRAP augmente :
- avec la complexité ;
- avec la non-couverture.

Cela raconte une histoire simple :
- Les méthodes complexes sont plus difficiles à comprendre.
- Les méthodes peu testées sont plus risquées.
- Une méthode complexe et non testée est une bombe à retardement.

Le CRAP score permet donc de mesurer rapidement le risque lié à chaque méthode.


## Pourquoi le CRAP score est important ?

Même si ce n’est pas une métrique aussi populaire que la complexité cyclomatique ou la couverture de tests, elle reste très utile.

À mesure que les projets grossissent, certaines méthodes tombent dans l’oubli et deviennent de véritables pièges : trop complexes, mal testées, dangereuses à modifier.

Le CRAP score aide à repérer précisément ces zones à risque avant qu’un bug ou une évolution ne vous y replonge dans l’urgence.
