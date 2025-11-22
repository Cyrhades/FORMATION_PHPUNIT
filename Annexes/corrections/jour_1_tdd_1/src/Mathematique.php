<?php  declare(strict_types=1);

namespace App;

use App\Exception\DivisionByZeroException;

class Mathematique {

    /**
     * Effectue une addition entre deux nombres.
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    public function addition(float $number1, float $number2): float {
        return $number1 + $number2;
    }

    /**
     * Effectue une soustraction entre deux nombres.
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    public function soustraction(float $number1, float $number2): float {
        return $number1 - $number2;
    }

    /**
     * Effectue une multiplication entre deux nombres.
     *
     * @param float $number1
     * @param float $number2
     * @return float
     */
    public function multiplication(float $number1, float $number2): float {
        return $number1 * $number2;
    }
    
    /**
     * Effectue une division entre deux nombres.
     *
     * @param float $number1
     * @param float $number2
     * 
     * @throws DivisionByZeroException si $number2 vaut zéro
     * @return float
     */
    public function division(float $number1, float $number2): float {
        if ($number2 == 0) {
            // App\Exception\DivisionByZeroException
            throw new DivisionByZeroException('Division By Zero is not allowed.');
        }
        return $number1/$number2;
    }
}