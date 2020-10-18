<?php

namespace App;

use App\Service\AppService;
use App\Service\ConfigService;
use App\Controller\ErrorController;

class App
{
    public static function run()
    {
        $routes = ConfigService::get('routes');
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestRoute = $_SERVER['REQUEST_URI'];

        foreach ($routes as $key => $options) {
            $pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($options['url'])) . "$@D";
            $matches = [];
            if ($requestMethod === $options['method'] && preg_match($pattern, $requestRoute, $matches)) {
                if (isset($options['guard']) && $options['guard'] && !AppService::isLogged()) {
                    (new ErrorController())->unauthorized();
                    return;
                }
                array_shift($matches);
                $controllerName = 'App\Controller\\' . ucfirst($options['controller']) . 'Controller';
                $controller = new $controllerName;
                $controller->{$options['action']}(...$matches);
                return;
            }
        }

        (new ErrorController())->notFound();
    }
}
