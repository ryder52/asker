<?php

namespace App;

use App\Service\ConfigService;
use PDO;

class Database {

    private static ?Database $instance = null;
    private PDO $connection;

    private function __construct()
    {
        $config = ConfigService::get('database');
        $this->connection = new PDO(
            "mysql:host={$config['host']};dbname={$config['name']}",
            $config['user'],
            $config['pass']
        );
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
