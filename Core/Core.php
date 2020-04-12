<?php

namespace Core;

class Core
{
    public function run()
    {
        require_once(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'routes.php']));

        if ($route = Router::get(substr($_SERVER["REQUEST_URI"], strlen(BASE_URI)))) {
            isset($route['params']) ? $params = $route['params'] : $params = null;
            $ctrl = "Controller\\" . ucfirst($route['controller']) . "Controller";
            $method = $route['action'] . "Action";
            $ctrl = new $ctrl();
            $params != null ? $ctrl->$method(...$params) : $ctrl->$method();
        } else {
            $pathArray = explode(DIRECTORY_SEPARATOR, $_SERVER["REQUEST_URI"]);
            if (class_exists($ctrl = "Controller\\" . ucfirst($pathArray[2]) . "Controller")) {
                $ctrl = new $ctrl();
                if (!array_key_exists(3, $pathArray) || $pathArray[3] == "") {
                    $ctrl->indexAction();
                } else if (method_exists($ctrl, $method = $pathArray[3] . "Action")) {
                    $ctrl->$method();
                } else {
                    echo "<h1>404</h1>";
                }
            } else {
                echo "<h1>404</h1>";
            }
        }
    }
}
