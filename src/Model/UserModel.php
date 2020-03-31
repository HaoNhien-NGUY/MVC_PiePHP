<?php

namespace Model;

use Core\ORM;

class UserModel
{
    private $email;
    private $password;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($pwd)
    {
        $this->password = $pwd;
    }

    public function save()
    {
        ORM::create('users', ['email' => $this->email, 'password' => $this->password]);
    }
}
