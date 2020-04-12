<?php

namespace Model;

use Core\Entity;

class UserModel extends Entity
{

    protected $relation = ['many' => ['articles' => 'user_id', 'comments' => 'user_id'], 'one' => ['promos' => 'promo_id']];

    public function allo()
    {
        echo "<h1>ALLO TEST</h1>";
    }

}
