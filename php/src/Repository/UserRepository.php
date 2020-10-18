<?php

namespace App\Repository;

use Exception;

class UserRepository extends BaseRepository
{

    /**
     * @throws Exception
     */
    public function getUserId(string $name, string $password): int
    {
        $sql = 'SELECT * FROM Users WHERE name = :name';
        $bind = ['name' => $name];
        $user = $this->selectOne($sql, $bind);

        if (empty($user)) {
            throw new Exception('Invalid username');
        }

        if (!password_verify($password, $user['password'])) {
            throw new Exception('Invalid password');
        }
        return $user['id'];
    }

    /**
     * @throws Exception
     */
    public function register(string $name, string $password): void
    {
        $sql = 'INSERT INTO Users (name, password) VALUES (:name, :password)';
        $bind = ['name' => $name, 'password' => password_hash($password, PASSWORD_BCRYPT)];
        $this->insert($sql, $bind);
    }
}
