<?php

namespace Model;

use Core\Entity;

class GenreModel extends Entity
{

    protected $relation = ['many' => ['films' => 'genre_id']];

}
