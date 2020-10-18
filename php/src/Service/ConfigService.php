<?php

namespace App\Service;

class ConfigService
{
    private static array $config = [];

    /**
     * Get config array or single config value
     */
    public static function get(string $file, string $key = null)
    {
        if (is_null(self::$config[$file])) {
            self::$config[$file] = require_once(ROOT . '/config/' . $file . '.php');
        }

        if (is_null($key)) {
            return self::$config[$file];
        }

        return !empty(self::$config[$file][$key]) ? self::$config[$file][$key] : null;
    }
}
