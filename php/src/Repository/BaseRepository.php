<?php

namespace App\Repository;

use App\Database;
use Exception;
use PDO;

class BaseRepository
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function selectOne(string $sql, array $bind): array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($bind);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function selectAll(string $sql, array $bind): array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($bind);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @throws Exception
     */
    public function insert(string $sql, array $bind): void
    {
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute($bind)) {
            throw new Exception('Failed to insert record');
        }
    }

    /**
     * @throws Exception
     */
    public function update(string $sql, array $bind): void
    {
        $this->insert($sql, $bind);
    }
}
