<?php
namespace HackOeil;
/**
 * Explication d'un Dummy dans les "test doubles" (doublures)
 * 
 * Un dummy est une doublure de test utilisée pour remplacer un objet dont on n’a pas réellement 
 * besoin pendant l’exécution du test. On l’emploie généralement quand une dépendance est 
 * indispensable pour instancier la classe à tester, mais que son comportement n’a aucune 
 * importance pour le scénario testé. Il peut aussi être simplement passé en argument à 
 * une méthode, sans jamais être utilisé dans le corps du test.
 * 
 * @author LECOMTE Cyril <cyril@hack-oeil.fr>
 * @version 0.0.1
 */

require '../autoload.php';

function test1(Product $product, int $quantity) {

}

