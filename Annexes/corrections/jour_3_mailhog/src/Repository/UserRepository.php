<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use PDO;

final class UserRepository extends AbstractRepository
{
    public function save(User $user): User
    {
        $stmt = $this->getDb()->prepare("
            INSERT INTO users (name, renom, email, password)
            VALUES (:name, :renom, :email, :password)
        ");

        $stmt->execute([
            ':name'     => $user->getName(),
            ':renom'    => $user->getRenom(),
            ':email'    => $user->getEmail(),
            ':password' => $user->getPasswordHash()
        ]);

        $user->setId((int) $this->getDb()->lastInsertId());
        return $user;
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return new User(
            (int) $result['id'],
            $result['name'],
            $result['renom'],
            $result['email'],
            $result['password']
        );
    }
}
