<?php

namespace Controller;

use Core\Controller;

class UserController extends Controller
{
    function __construct()
    {
        echo "<h2>" . __CLASS__ . " instanced</h2>";
    }

    public function addAction(){
        echo __METHOD__;
    }

    public function indexAction(){
        echo __METHOD__;
    }

    public function registerAction(){
        
    }
    
}
