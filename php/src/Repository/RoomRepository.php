<?php

namespace App\Repository;

use Exception;

class RoomRepository extends BaseRepository
{

    public function getById(string $id): array
    {
        $sql = 'SELECT * FROM Rooms WHERE id = :id';
        $bind = ['id' => $id];
        return $this->selectOne($sql, $bind);
    }

    public function getByAuthor(int $author): array
    {
        $sql = 'SELECT * FROM Rooms WHERE author = :author';
        $bind = ['author' => $author];
        return $this->selectAll($sql, $bind);
    }

    /**
     * @throws Exception
     */
    public function create(string $name, int $author): string
    {
        $id = bin2hex(random_bytes(5));
        $sql = 'INSERT INTO Rooms (id, name, author) VALUES (:id, :name, :author)';
        $bind = ['id' => $id, 'name' => $name, 'author' => $author];
        $this->insert($sql, $bind);
        return $id;
    }
}
