<?php

namespace Model;

use Core\Entity;

class UserModel extends Entity
{
    private $email;
    private $password;
    private static $relation = ['many' => ['articles' => 'user_id']];

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($pwd)
    {
        $this->password = $pwd;
    }
}
