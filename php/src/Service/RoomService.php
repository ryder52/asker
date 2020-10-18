<?php

namespace App\Service;

use App\Repository\RoomRepository;

class RoomService
{

    public function getById(string $id): array
    {
        $repository = new RoomRepository();
        return $repository->getById($id);
    }

    public function getByAuthor(int $author = null): array
    {
        $repository = new RoomRepository();
        $author = $author ?? (int) $_SESSION['id'];
        return $repository->getByAuthor($author);
    }

    public function create(string $name)
    {
        $repository = new RoomRepository();
        $author = AppService::getUserId();
        try {
            return $repository->create($name, $author);
        } catch (\Exception $e) {
            return false;
        }
    }
}
