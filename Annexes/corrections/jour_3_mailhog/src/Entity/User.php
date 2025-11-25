<?php declare(strict_types=1);

namespace App\Entity;

final class User
{
    private ?int $id;
    private string $name;
    private string $renom;
    private string $email;
    private string $passwordHash;

    public function __construct(
        ?int $id,
        string $name,
        string $renom,
        string $email,
        string $passwordHash
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->renom = $renom;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getRenom(): string { return $this->renom; }
    public function getEmail(): string { return $this->email; }
    public function getPasswordHash(): string { return $this->passwordHash; }

    public function setId(int $id): void { $this->id = $id; }
}
