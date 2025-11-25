<?php declare(strict_types=1);

namespace App\Service;

use PDO;
use PDOException;

final class Database {
 
    private ?PDO $db = null;
    
    public function connect(string $dsn, ?string $login = null, ?string $password = null): PDO 
    {
        if ($this->db instanceof PDO) {
            return $this->db;
        }

        try {
            $this->db = new PDO($dsn, $login, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur BDD : " . $e->getMessage());
        }

        return $this->db;
    }

    public function getConnection(): PDO
    {
        if (!$this->db) {
            throw new \RuntimeException("Aucune connexion à la base n'est active.");
        }
        return $this->db;
    }
}
