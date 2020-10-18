<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService
{

    public function login(string $user, string $password): bool
    {
        $repository = new UserRepository();
        try {
            $id = $repository->getUserId($user, $password);
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['id'] = $id;
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function register(string $user, string $password): bool
    {
        $repository = new UserRepository();
        try {
            $repository->register($user, $password);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
