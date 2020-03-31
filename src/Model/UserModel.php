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
    }

    public function save()
    {
        var_dump(ORM::find('users', null, ['ORDER BY' => 'id ASC', 'LIMIT' => '']));
    }
}
