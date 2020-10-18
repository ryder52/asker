<?php

namespace App\Repository;

use Exception;

class QuestionRepository extends BaseRepository
{

    public function getAllForRoom(string $room): array
    {
        $sql = 'SELECT * FROM Questions WHERE room = :room ORDER BY likes DESC, answer IS NULL DESC';
        $bind = ['room' => $room];
        return $this->selectAll($sql, $bind);
    }

    public function getOneById(int $id): array
    {
        $sql = 'SELECT * FROM Questions WHERE id = :id';
        $bind = ['id' => $id];
        return $this->selectOne($sql, $bind);
    }

    /**
     * @throws Exception
     */
    public function add(string $room, string $author, string $text): void
    {
        $sql = 'INSERT INTO Questions (room, text, author) VALUES (:room, :text, :author)';
        $bind = ['room' => $room, 'text' => $text, 'author' => $author];
        $this->insert($sql, $bind);
    }

    /**
     * @throws Exception
     */
    public function answer(int $question, string $answer): void
    {
        $sql = 'UPDATE Questions SET answer = :answer WHERE id = :id';
        $bind = ['id' => $question, 'answer' => $answer];
        $this->update($sql, $bind);
    }

    /**
     * @throws Exception
     */
    public function react(int $question, string $action): void
    {
        if ($action === 'like') {
            $sql = 'UPDATE Questions SET likes = likes + 1 WHERE id = :id';
        } else {
            $sql = 'UPDATE Questions SET dislikes = dislikes + 1 WHERE id = :id';

        }
        $bind = ['id' => $question];
        $this->update($sql, $bind);
    }
}
