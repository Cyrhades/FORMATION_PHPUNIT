# Premiers tests

## Vérification des valeurs de retour

Nous allons dans un premier temps voir les conventions et étapes de base pour écrire des tests avec PHPUnit avec PHP 8.x.

1. Le nommage des fichiers de test: 
    Conventionnellement pour une classe nommée **Mathematique** les tests seront placés dans une classe nommée **MathematiqueTest**.
2. **MathematiqueTest** doit hériter de **PHPUnit\Framework\TestCase**.
3. Les tests sont des méthodes avec une visilibilité publique dont le nom commence par **test**.

```
Une alternative étant d'identifier comme méthode de test à l'aide d'un attibut #[Test] au dessus. Pensez à charger la classe avec use PHPUnit\Framework\Attributes\Test.
```

4. À l’intérieur des méthodes de test, des méthodes d’assertion comme assertSame() sont utilisées pour vérifier qu’une valeur réelle correspond à une valeur attendue.

