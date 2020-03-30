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
        return array_key_exists(trim($url, "/"), self::$routes) ? self::$routes[trim($url, "/")] : null;
    }
}
