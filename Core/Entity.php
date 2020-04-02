<?php

namespace Core;

class Entity
{
    function __construct($params)
    {
        var_dump(get_class($this));
    }
}