<?php

namespace Model;

use Core\Entity;

class ArticleModel extends Entity
{
    private static $relation = [
        'many' => ['comments' => 'article_id', 'tags' => 'article_id'],
        'one' => ['users' => 'article_id']];
}