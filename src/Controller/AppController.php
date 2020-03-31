<?php

namespace Controller;

use Core\Controller;
use Core\Core;

class AppController extends Controller
{
    public function indexAction(){
        echo __METHOD__ ."<br>";
        var_dump(\Core\ORM::delete('users', 21));
    }
}
