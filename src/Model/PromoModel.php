<?php

namespace Model;

use Core\Entity;

class PromoModel extends Entity
{

    protected $relation = ['many' => ['users' => 'user_id']];

}
