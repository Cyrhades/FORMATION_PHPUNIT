# Test doubles

Les tests doubles sont des objets simulés qui remplacent de vraies dépendances dans un test. Ils permettent de tester une classe sans faire appel à une base de données, une API, un filesystem, etc.

PHPUnit propose plusieurs types de doubles, chacun ayant un rôle précis.
- Dummy : un objet vide, utilisé uniquement pour remplir un paramètre obligatoire.
```php
class User {}
class Mailer {
    public function send(User $user): bool { return true; }
}

class MailerTest extends TestCase
{
    public function testDummy(): void
    {
        $dummyUser = $this->createStub(User::class); // objet “vide”
        $mailer = new Mailer();

        $this->assertTrue($mailer->send($dummyUser));
    }
}
```

- Stub : fournit des réponses prédéfinies pour contrôler le comportement d’une dépendance.
```php
class PriceService {
    public function getPrice(): int { return 42; }
}

class Cart {
    public function __construct(private PriceService $priceService) {}

    public function total(): int {
        return $this->priceService->getPrice();
    }
}

class CartTest extends TestCase
{
    public function testStubReturnsFixedValue(): void
    {
        $stub = $this->createStub(PriceService::class);
        $stub->method('getPrice')->willReturn(100); // valeur fixée

        $cart = new Cart($stub);

        $this->assertSame(100, $cart->total());
    }
}
```
  
- Mock : vérifie qu'un appel a bien été effectué (avec arguments et nombre d'appels).
```php
class Logger {
    public function log(string $msg): void {}
}

class Service {
    public function __construct(private Logger $logger) {}

    public function run(): void {
        $this->logger->log("start");
    }
}

class ServiceTest extends TestCase
{
    public function testMockChecksMethodCall(): void
    {
        $mock = $this->createMock(Logger::class);
        $mock->expects($this->once())            // doit être appelé 1 fois
             ->method('log')
             ->with('start');                    // avec cet argument

        $service = new Service($mock);
        $service->run();
    }
}
```

- Spy : semblable à un mock, mais enregistre passivement les interactions sans les exiger.
```php
class SpyLogger {
    public array $messages = [];

    public function log(string $msg): void {
        $this->messages[] = $msg; // on mémorise
    }
}

class SpyTest extends TestCase
{
    public function testSpyRecordsCalls(): void
    {
        $spy = new SpyLogger();

        $spy->log('hello');
        $spy->log('world');

        $this->assertSame(['hello', 'world'], $spy->messages);
    }
}

```

- Fake : une implémentation simplifiée mais fonctionnelle (ex. : un faux repository en mémoire).
```php
class UserRepositoryFake {
    private array $users = [];

    public function save(string $name): void {
        $this->users[] = $name;
    }

    public function all(): array {
        return $this->users;
    }
}

class FakeTest extends TestCase
{
    public function testFakeRepository(): void
    {
        $repo = new UserRepositoryFake();

        $repo->save('Alice');
        $repo->save('Bob');

        $this->assertSame(['Alice', 'Bob'], $repo->all());
    }
}
```

Ces doubles permettent d’isoler précisément ce que l’on teste en évitant les effets de bord.

Bien utilisés, ils rendent les tests plus rapides, stables et faciles à maintenir.
