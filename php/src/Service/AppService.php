<?php

namespace App\Service;

class AppService
{

    /**
     * Get single route uri with params
     */
    public static function getRoute(string $name, array $params = []): string
    {
        $routes = ConfigService::get('routes');
        if (isset($routes[$name])) {
            $url = $routes[$name]['url'];
            if (!empty($params)) {
                foreach ($params as $key => $value) {
                    $url = str_replace(':' . $key, $value, $url);
                }
            }
            return $url;
        }
        return '';
    }

    /**
     * Get array of routes in JSON for js
     */
    public static function getJsRoutes(): string
    {
        $output = [];
        foreach (ConfigService::get('routes') as $name => $options) {
            $output[$name] = $options['url'];
        }
        return json_encode($output);
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION["logged"]) && $_SESSION["logged"] === true;
    }

    /**
     * Get ID of logged user
     */
    public static function getUserId(): ?int
    {
        return (int) $_SESSION['id'] ?? null;
    }
}
