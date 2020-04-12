<?php

namespace Model;

use Core\Entity;

class FilmModel extends Entity
{

    protected $relation = ['one' => ['genres' => 'genre_id']];

}
