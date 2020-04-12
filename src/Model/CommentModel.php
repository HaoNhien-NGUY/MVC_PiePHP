<?php

namespace Model;

use Core\Entity;

class CommentModel extends Entity
{
    protected $relation = ['one' => ['articles' => 'article_id', 'users' => 'user_id']];
}