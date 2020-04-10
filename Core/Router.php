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
        // return array_key_exists(trim($url, "/"), self::$routes) ? self::$routes[trim($url, "/")] : null;

        if (array_key_exists(trim($url, "/"), self::$routes)) {
            return self::$routes[trim($url, "/")];
        } else {
            //check regex params idk
            //then explode url from the length of the matching string ?

            //or
            //explode both path
            //array_diff
            //if diff == {something}
            //etc ...
        }
    }
}