<?php

namespace Model;

use Core\Entity;

class TagModel extends Entity
{

    protected $relation = ['many_many' => ['articles' => ['pivot' => 'articles_tags', 'rel' => 'article_id', 'rel_pivot' => 'tag_id']]];

}
