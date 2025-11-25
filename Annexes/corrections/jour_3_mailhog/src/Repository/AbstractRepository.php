<?php declare(strict_types=1);

namespace App\Repository;

use App\Service\Database;

abstract class AbstractRepository {

    private \PDO $db;

    public function __construct() {
        $this->db = (new Database)->connect($_ENV['DSN_MYSQL']);
    }

    protected function getDb():\PDO {
        return $this->db;
    }

}