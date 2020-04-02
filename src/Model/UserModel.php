<?php

namespace Model;

use Core\Entity;
use Core\ORM;

class UserModel extends Entity
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
}
