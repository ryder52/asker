<?php

namespace App\Controller;

use App\Service\ConfigService;

class BaseController
{

    private array $js = [];
    private array $css = [];
    private array $vars = [];
    private array $jsVars = [];
    private string $layout = 'default';

    public function set(array $var)
    {
        $this->vars = array_merge($this->vars, $var);
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function setJs($js)
    {
        $this->js[] = $js;
    }

    public function setJsVar($jsVar)
    {
        $this->jsVars = array_merge($this->jsVars, $jsVar);
    }

    public function setCss($css)
    {
        $this->css[] = $css;
    }

    public function render($template)
    {
        extract($this->vars);
        ob_start();
        $js = $this->js;
        $css = $this->css;
        $jsVars = $this->jsVars;

        [$folder, $view] = explode('/', $template);
        require(APPROOT . '/View/' . ucfirst($folder) . '/' . ucfirst($view) . 'View.php');

        $content = ob_get_clean();
        if ($this->layout) {
            require(APPROOT . '/View/Layout/' . ucfirst($this->layout) . 'Layout.php');
        } else {
            echo $content;
        }
    }

    public function redirect($route)
    {
        $routes = ConfigService::get('routes');
        if (isset($routes[$route])) {
            header("Location: " . $routes[$route]['url']);
            exit;
        }
    }
}
