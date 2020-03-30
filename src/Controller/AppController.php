<?php

namespace Controller;

use Core\Controller;
use Core\ORM;

class AppController extends Controller
{
    public function indexAction(){
        echo __METHOD__ ."<br>";
    }
}
