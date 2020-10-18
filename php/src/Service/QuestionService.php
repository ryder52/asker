<?php

namespace App\Service;

use App\Repository\QuestionRepository;

class QuestionService
{

    public function getAllForRoom(string $room): array
    {
        $repository = new QuestionRepository();
        return $repository->getAllForRoom($room);
    }

    public function getOneById(int $id): array
    {
        $repository = new QuestionRepository();
        return $repository->getOneById($id);
    }

    public function add(string $room, string $author, string $text): bool
    {
        $repository = new QuestionRepository();
        try {
            $repository->add($room, $author, $text);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function answer(int $question, string $answer): bool
    {
        $repository = new QuestionRepository();
        try {
            $repository->answer($question, $answer);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function react(int $question, string $action): bool
    {
        $repository = new QuestionRepository();
        try {
            $repository->react($question, $action);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
