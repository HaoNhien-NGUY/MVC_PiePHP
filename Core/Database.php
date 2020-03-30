<?php

namespace Core;
use PDO;

class Database {
    private $dbhost = "127.0.0.1";
    private $dbuser = "root";
    private $dbpass = "kappa123";
    private $dbname = 'MVC_PiePHP';

    protected function OpenCon()
    {
        $conn = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset=utf8mb4', $this->dbuser, $this->dbpass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
    }
}