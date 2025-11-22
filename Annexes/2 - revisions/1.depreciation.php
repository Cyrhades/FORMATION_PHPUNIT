<?php  declare(strict_types=1);
/**
 * Exemple de gestion de dépréciation dans votre code.
 * @see https://wiki.php.net/rfc/deprecated_attribute
 */

#[Deprecated("Utilisez newFunction() à la place", "8.4")]
function oldFunction(float $a, float $b): float {
    
    if (!is_float($a)) {
        throw new InvalidArgumentException("Le paramètre \$a doit être un float, " . gettype($a) . " reçu.");
    }

    if (!is_float($b)) {
        throw new InvalidArgumentException("Le paramètre \$b doit être un float, " . gettype($b) . " reçu.");
    }
    
    return $a+$b;
}

function newFunction(float $a, float $b): float {

    return $a+$b;
}

echo oldFunction(3,1); 