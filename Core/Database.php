<?php

namespace Core;
use PDO;

class Database {
    private static $dbhost = "127.0.0.1";
    private static $dbuser = "root";
    private static $dbpass = "kappa123";
    private static $dbname = 'MVC_PiePHP';

    public static function OpenCon()
    {
        $conn = new PDO('mysql:host='.self::$dbhost.';dbname='.self::$dbname.';charset=utf8mb4', self::$dbuser, self::$dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
    }
}