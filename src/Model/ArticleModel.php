<?php

namespace Model;

use Core\Entity;

class ArticleModel extends Entity
{

    protected $relation = ['many_many' => ['articles' => 'user_id']];

    public function testMethod()
    {
        echo "<h1>BONJOUR</h1>";
        return true;
    }

}