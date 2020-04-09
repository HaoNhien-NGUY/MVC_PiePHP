<?php

namespace Model;

use Core\Entity;

class TagModel extends Entity
{

    protected $relation = ['many_many' => ['articles' => 'user_id']];

}