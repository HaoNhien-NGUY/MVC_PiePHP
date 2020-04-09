<?php

namespace Model;

use Core\Entity;

class ArticleModel extends Entity
{

    protected $relation = ['many_many' => ['tags' => ['pivot' => 'articles_tags', 'rel' => 'tag_id', 'rel_pivot' => 'article_id']]];

    //read('articles_tags', [])

    public function testMethod()
    {
        echo "<h1>BONJOUR</h1>";
        return true;
    }

}