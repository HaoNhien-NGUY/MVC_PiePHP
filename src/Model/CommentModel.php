<?php

namespace Model;

use Core\Entity;

class CommentModel extends Entity
{
    private static $relation = ['one' => ['article' => 'comment_id']];
}