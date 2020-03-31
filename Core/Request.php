<?php

namespace Core;

class Request {

    public $params;

    function __construct()
    {
        foreach($_REQUEST as $key => $val){
            $this->params[$key] = htmlspecialchars(stripslashes(trim($val)));
        }
    }
}