<?php

namespace Core;

class Router
{
    private static $routes;

    public static function connect($url, $route)
    {
        self::$routes[trim($url, "/")] = $route;
    }

    public static function get($url)
    {
        if (isset(self::$routes[trim($url, "/")])) {
            return self::$routes[trim($url, "/")];
        } else if(is_array(self::$routes)) {
            $urlArray = explode('/', trim($url, "/"));
            foreach (self::$routes as $urlRoute => $v) {
                $paramsName = array_diff(explode('/', $urlRoute), $urlArray);
                $paramCheck = count(preg_grep("/{[a-zA-Z0-9]+(\??)}/", $paramsName));
                if ($paramCheck > 0 && $paramCheck == count($paramsName)) {
                    foreach ($paramsName as $offset => $val) {
                        if(substr($val, -2, 1) == '?') {
                            if (isset($urlArray[$offset])) {
                                self::$routes[$urlRoute]['params'][] = $urlArray[$offset];
                            }
                        } else {
                            if (isset($urlArray[$offset])) {
                                self::$routes[$urlRoute]['params'][] = $urlArray[$offset];
                            } else {
                                return null;
                            }
                        }
                    }
                    return self::$routes[$urlRoute];
                }
            }
        }
        return null;
    }
}
