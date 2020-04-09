<?php

namespace Model;

use Core\Entity;

class UserModel extends Entity
{

    protected $relation = ['many' => ['articles' => 'user_id'], 'one' => ['table' => 'promos', 'rel' => 'promo_id']];

}
