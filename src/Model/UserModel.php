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

    public function save()
    {
        return ORM::create('users', ['email' => $this->email, 'password' => $this->password]);
    }

    public function read($id)
    {
        return ORM::find('users', $id);
    }

    public function read_all()
    {
        return ORM::find('users', null);
    }
}
