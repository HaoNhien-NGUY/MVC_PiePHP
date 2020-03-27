<?php

namespace Controller;

class UserController
{
    function __construct()
    {
        echo "<h2>" . __CLASS__ . " intanced</h2>";
    }

    public function addAction(){
        echo __METHOD__;
    }

    public function indexAction(){
        echo __METHOD__;
    }
    
}
