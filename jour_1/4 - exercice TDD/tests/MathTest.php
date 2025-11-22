<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Mathematique;
use App\Exception\DivisionByZeroException;

/**
 * Class MathTest
 *
 * Tests unitaires pour la classe App\Mathematique.
 * 
 * Chaque test suit le pattern AAA :
 *  - Arrange : préparation des données
 *  - Act     : exécution de la méthode à tester
 *  - Assert  : vérification du résultat
 *
 * Et respecte le principe FIRST :
 *  - Fast, Independent, Repeatable, Self-validating, Timely
 */
class MathTest extends TestCase
{
    private Mathematique $math;

    /**
     * setUp() est appelée avant chaque test pour garantir l’isolation (FIRST - Independent).
     */
    protected function setUp(): void
    {
        $this->math = new Mathematique();
    }

    /**
     * Teste l'addition pour plusieurs cas d’usage.
     */
    public function testAdditionReturnsExpectedValues(): void
    {
        // Arrange
        $a = 5;
        $b = 2;

        // Act
        $result = $this->math->addition($a, $b);

        // Assert
        $this->assertEquals(7, $result, '5 + 2 doit être égal à 7');

        $a = 5.5;
        $b = 4.5;
        $result = $this->math->addition($a, $b);
        $this->assertEquals(10, $result, '5.5 + 4.5 doit être égal à 10');
    }

    /**
     * Teste la multiplication pour des cas simples et décimaux.
     */
    public function testMultiplicationReturnsExpectedValues(): void
    {
        $a = 5;
        $b = 2;

        $result = $this->math->multiplication($a, $b);

        $this->assertEquals(10, $result, '5 × 2 doit être égal à 10');


        $a = 5.5;
        $b = 4;

        $result = $this->math->multiplication($a, $b);

        $this->assertEquals(22, $result, '5.5 × 4 doit être égal à 22');
    }

    /**
     * Teste la soustraction dans différents scénarios.
     */
    public function testSoustractionReturnsExpectedValues(): void
    {
        // Arrange
        $a = 5;
        $b = 2;

        // Act
        $result = $this->math->soustraction($a, $b);

        // Assert
        $this->assertEquals(3, $result, '5 - 2 doit être égal à 3');


        $a = 5;
        $b = 6;

        $result = $this->math->soustraction($a, $b);

        $this->assertEquals(-1, $result, '5 - 6 doit être égal à -1');
    }

    /**
     * Teste la division dans des cas valides.
     */
    public function testDivisionReturnsExpectedValues(): void
    {
        // Arrange
        $a = 10;
        $b = 2;

        // Act
        $result = $this->math->division($a, $b);

        // Assert
        $this->assertEquals(5, $result, '10 ÷ 2 doit être égal à 5');


        $a = 9;
        $b = 3;

        $result = $this->math->division($a, $b);

        $this->assertEquals(3, $result, '9 ÷ 3 doit être égal à 3');
    }

    /**
     * Teste la division par zéro : doit lever une exception.
     */
    public function testDivisionByZeroThrowsException(): void
    {
        // Arrange
        $a = 10;
        $b = 0;

        // Assert (préparation de l’attente)
        $this->expectException(DivisionByZeroException::class);

        // Act
        $this->math->division($a, $b);
    }
}
