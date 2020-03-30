<?php

namespace Model;

use Core\ORM;

class UserModel
{
    private $email;
    private $password;
    private $orm;

    function __construct()
    {
        $this->orm = new ORM();
    }

    public function save(){
        $this->orm->create('users', ['email' => $this->email, 'password' => $this->password]);
    }
}